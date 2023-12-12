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
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
            $category = Category::find($category_id);
            $categoryName = $category ? $category->category_name : '';
        } else {
            $products = Product::all();
            $categoryName = ''; // Set a default value when not filtering by category
        }

        $categories = Category::all();

        return view('/home', compact('title','category_id', 'products', 'categoryName', 'categories'));
    }

    function about() {
        $title = "About Us";
        return view('/about', compact('title'));
    }

    function contact() {
        $title = "Contact Us";
        return view('/contact', compact('title'));
    }

    function profile() {
        $title = "Profile";
        return view('/profile', compact('title'));
    }
}
