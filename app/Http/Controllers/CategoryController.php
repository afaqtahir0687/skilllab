<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
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
            'category' => 'required',
            'sub_category' => 'required',
            'category_code' => 'nullable',
        ]);

        $category = new Category();
        $category->category = $request->category;
        $category->sub_category = $request->sub_category;
        $category->category_code = $request->category_code;
        $category->save();
        return redirect()->back()->with('success', 'Category Created Successfully');   
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
        $category = Category::where('id', $id)->first();
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'category_code' => ['required', Rule::unique('categories')->ignore($id)],
        ]);

        $category = Category::find($id);
        $category->category = $request->category;
        $category->sub_category = $request->sub_category;
        $category->category_code = $request->category_code;
        $category->save();
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
