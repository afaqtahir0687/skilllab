<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load brand and category relationships
        $products = Product::with(['brand', 'category'])->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'brand_id' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'currency' => 'required',
        'quantity' => 'required',
        'barcode' => 'nullable',
        'description' => 'nullable',
        'production_date' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->currency = $request->currency;
        $product->quantity = $request->quantity;
        $product->production_date = $request->date;
        $product->barcode = $request->barcode;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $imagePath = $image->store('assets/img', 'public');
                $product->image = $imagePath;
            } else {
                return redirect()->back()->withErrors(['image' => 'The uploaded image is not valid.'])->withInput();
            }
        }
        $product->save();
        return redirect('products/index')->with('Success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['brand', 'category'])->find($id);
            if (!$product) {
                return redirect()->route('products.index')->with('error', 'Product not found!');
            }
        return view('products.show', compact('product'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::where('id', $id)->first();
        return view('products.edit', compact('brands', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required',
        'brand_id' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'currency' => 'required',
        'quantity' => 'required',
        'barcode' => 'nullable',
        'description' => 'nullable',
        'production_date' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->currency = $request->currency;
        $product->quantity = $request->quantity;
        $product->production_date = $request->date;
        $product->barcode = $request->barcode;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $imagePath = $image->store('assets/img', 'public');
                $product->image = $imagePath;
            } else {
                return redirect()->back()->withErrors(['image' => 'The uploaded image is not valid.'])->withInput();
            }
        }
        $product->save();
        return redirect('products/index')->with('Success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('Success', 'Product Deleted Successfully!');
        }
        return redirect()->route('products.index')->with('error', 'Product not found!');
    }
}
