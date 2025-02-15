<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [ 'required', Rule::unique('users'), ],
            'password' => 'required|min:4',
            'retype_password' => 'required|min:4',
            'phone_number' => 'nullable|string|max:20',
            'image' => 'nullable', 
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
        if ($request->password !== $request->retype_password) {
            return redirect()->back()->withErrors(['retype_password' => 'The password and retype password must match'])->withInput();
        }
        $uid = (string) Str::uuid();
        $user = new User;
        $user->uid = $uid;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->retype_password = Hash::make($request->retype_password);
        $user->phone_number = $request->phone_number;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $imagePath = $image->store('images', 'public');
                $user->image = $imagePath;
            } else {
                return redirect()->back()->withErrors(['image' => 'The uploaded image is not valid.'])->withInput();
            }
        }
        
        $user->save();
        Mail::to($user->email)->send(new VerificationMail($user));
        return redirect()->route('login')->with('message', 'Sign Up Successfully! Please Verify Your E-Mail');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('profile.profile', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', Rule::unique('users')->ignore($id),],
            'phone_number' => 'nullable|string|max:20',
            // 'password' => 'required|min:4', // Remove this line
            'image' => 'nullable', 
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
    
        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
    
            // Remove the password update line
            // $user->password = Hash::make($request->password);
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $imagePath = $image->store('assets/img', 'public');
                    $user->image = $imagePath;
                } else {
                    return redirect()->back()->withErrors(['image' => 'The uploaded image is not valid.'])->withInput();
                }
            }
            $user->save();
            return redirect()->route('profile')->with('message', 'Profile Updated Successfully!');
        } else {
            return redirect()->route('profile')->with('error', 'User not found!');
        }
    }
}
