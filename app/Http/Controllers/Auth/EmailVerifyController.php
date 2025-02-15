<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerificationMail;
use App\Mail\UserVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class EmailVerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function verifyEmail($encryptedData)
    {
        try {
            $decryptedData = Crypt::decrypt($encryptedData);
            $userId = $decryptedData['id'];
            // dd($userId);              
            $user = User::findOrFail($userId);
            $user->email_verified_at = now()->toDateTimeString();
            $user->save();   
            // dd($user); 
            return redirect('/')->with('message', 'Your email has been verified. Please login');
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect('/')->with('error', 'Invalid verification link.');
        }
    }
}
