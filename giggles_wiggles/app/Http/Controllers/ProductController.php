<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'GiggleWiggles Products';
        $categories = Category::all();

        $categoryName = '';
    
    
        $searchQuery = $request->input('search');
    
        if ($searchQuery) {
           
            $products = Product::where('product_name', 'LIKE', '%' . $searchQuery . '%')->get();
        } else {
        
            $category_id = $request->input('category_id');
    
            if ($category_id) {
                $products = Product::where('category_id', $category_id)->get();
                $category = Category::find($category_id);
                $categoryName = $category ? $category->category_name : '';
            } else {
                $products = Product::all();
            }
        }
    
        return view('product.index', compact('products', 'categories', 'title', 'categoryName', 'category_id'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $product = Product::with('category')->find($id); // Use 'category' relationship
    $categories = Category::all();

    if (!$product) {
        abort(404);
    }

    $categoryName = $product->category ? $product->category->category_name : '';
    $productName = $product->product_name;

    return view('product.show', compact('product', 'categories', 'categoryName', 'productName'));
    }


    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $results = Product::where('product_name', 'LIKE', '%' . $searchQuery . '%')->get();
    
        return view('product.index', compact('results'));
    }
    
}
