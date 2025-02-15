<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get();
        return view('Brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'image' => 'nullable|mimes:jpg,jpeg,png',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $imagePath = $image->store('assets/img', 'public');
                $brand->image = $imagePath;
            } else {
                return redirect()->back()->withErrors(['image' => 'The uploaded image is not valid.'])->withInput();
            }
        }
        $brand->save();
        return redirect()->back()->with('success', 'Brand Created Successfully');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::where('id', $id)->first();
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $imagePath = $image->store('assets/img', 'public');
                $brand->image = $imagePath;
            } else {
                return redirect()->back()->withErrors(['image' => 'The uploaded image is not valid.'])->withInput();
            }
        }
        $brand->save();
        return redirect()->back()->with('success', 'Brand Updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }
}
