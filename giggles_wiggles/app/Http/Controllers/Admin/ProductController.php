<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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
            'category_id' => 'required|integer',
            'price' => 'required|numeric|between:0,99999.99',
            'description' => 'nullable|string',
            'availability' => 'required|boolean',
            'quantity' => 'required|integer',
            'image' => 'required|string|max:255',
            'gender' => 'required|in:M,F,G',
        ]);
    
        $uploadedImage = $request->file('image');
        $productName = $request->input('product_name');
        $sanitizedName = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '_', $productName));
        $timestamp = now()->timestamp;
        $imageName = $sanitizedName . '.jpg';
    
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

        return redirect(route('admin.products'))->with('success', 'Product created successfully');
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
        // $valid = $request->validate([
        //     'product_name' => 'required|string|max:255',
        //     'category_id' => 'required|numeric',
        //     'price' => 'required|numeric|between:1,99999.99',
        //     'description' => 'required|string',
        //     'availability' => 'required|boolean',
        //     'quantity' => 'required|integer|min:1',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg',
        //     'gender' => 'required|in:M,F,G',
        // ]);
    

        $product = Product::find($id);
       
        $product->update([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'availability' => $request->input('availability'),
            'quantity' => $request->input('quantity'),
            'gender' => $request->input('gender'),
        ]);
    
        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $sanitizedName = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '_', $product->product_name));
            $fileName = $sanitizedName . '.jpg';
            $uploadedImage->move(public_path('images/products'), $fileName);
            $product->image = $fileName;
            $product->save();
        }
      
        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('admin.products'))->with('success', 'Product deleted successfully');
    }


    public function search(Request $request)
    {   
    
        $title = 'Search Product';
        $searchQuery = $request->input('search');
        $products = Product::where('product_name', 'LIKE', '%' . $searchQuery . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
                  ->get();

        return view('/admin/products/index', compact('products', 'title'));
    }


}