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
        
        $category_id = $request->input('category_id');
    
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
        } else {
            $products = Product::all();
        }
    
        return view('product.index', compact('products', 'categories', 'title'));
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
        $products = Product::find($id);
        $categories = Category::all();
    
        if (!$products) {
        
            abort(404);
        }
    
        return view('product.show', compact('products', 'categories'));
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
}
