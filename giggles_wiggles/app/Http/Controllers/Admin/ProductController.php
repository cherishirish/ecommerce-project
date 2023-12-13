<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Products";
        $products = Product::all(); 
    
        return view('admin/products/index', compact('title','products'));
    }
    
}
