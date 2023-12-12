<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{

    public function index(Request $request) {
        $title = "Home";
        $category_id = $request->input('category_id');
        
        // Fetch categories before checking category_id
        $categories = Category::all();
    
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
            $category = Category::find($category_id);
            $categoryName = $category ? $category->category_name : '';
        } else {
            $products = Product::all();
            $categoryName = ''; // Set a default value when not filtering by category
        }
        //dd($categories);
        return view('/home', compact('title', 'category_id', 'products', 'categoryName', 'categories'));
    }
    
    function about() {
        $title = "About Us";
        $categories = Category::all();
        return view('/about', compact('title', 'categories'));
    }

    function contact() {
        $title = "Contact Us";
        $categories = Category::all();
        return view('/contact', compact('title', 'categories'));
    }

    function profile() {
        $title = "Profile";
        $categories = Category::all();
        return view('/profile', compact('title', 'categories'));
    }
}
