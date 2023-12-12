<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{

    public function index() {
        $title = "Home";
        $products = Product::orderBy('price', 'desc')->take(3);
        return view('/home', compact('title', 'products'));
    }

    function about() {
        $title = "About Us";
        return view('/about', compact('title'));
    }

    function contact() {
        $title = "About Us";
        return view('/contact', compact('title'));
    }
}
