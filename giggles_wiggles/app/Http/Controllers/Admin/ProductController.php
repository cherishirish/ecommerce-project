<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Products";
        $products = Product::all(); 
       
        return view('admin/products/index', compact('title','products'));
    }

    public function create()
    {
        $title = "Create Product";
        $categories = Category::all();
        return view('admin/products/create', compact('title','categories') );
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric|between:1,99999.99',
            'description' => 'required|nullable|string',
            'availability' => 'required|boolean',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'gender' => 'required|in:M,F,G',
        ]);
    
        $uploadedImage = $request->file('image');
        $productName = $request->input('product_name');
        $sanitizedName = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '_', $productName));
        $timestamp = now()->timestamp;
        $imageName = $sanitizedName . '_' . $timestamp . '.jpg';
    
        $uploadedImage->move(public_path('images/products'), $imageName);

        Product::create([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'availability' => $request->input('availability'),
            'quantity' => $request->input('quantity'),
            'image' => $imageName,
            'gender' => $request->input('gender'),
        ]);
    
        return redirect()->route('admin/products/index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $title = 'Edit Product Record';
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('admin/products/edit', compact('title', 'product', 'categories'));
    
    }


    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric|between:1,99999.99',
            'description' => 'required|nullable|string',
            'availability' => 'required|boolean',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'gender' => 'required|in:M,F,G',
        ]);

        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $product->product_name = $request->input('product_name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->availability = $request->input('availability');
        $product->quantity = $request->input('quantity');
        $product->gender = $request->input('gender');

        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $sanitizedName = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '_', $product->product_name));
            $fileName = $sanitizedName . '.jpg';
            $uploadedImage->move(public_path('images/products'), $fileName);
            $product->image = $fileName;
        }else {
            return redirect()->back()->withErrors(['image' => 'Invalid image file']);
        }

        $product->save();

        return redirect('/admin/products/index')->with([
            'type' => 'success',
            'message' => 'Product updated successfully!',
        ]);
    }



    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$athlete) {
            return redirect('/admin/products/index')->with('error', 'Athlete not found');
        }

        $athlete->delete();
        return redirect('/admin/products/index')->with('success', 'Athlete deleted successfully');
    }



}