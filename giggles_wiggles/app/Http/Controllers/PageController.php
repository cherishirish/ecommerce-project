<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function about() {
        $title = "About Us";
        return view('/about', compact('title'));
    }

    function contact() {
        $title = "About Us";
        return view('/contact', compact('title'));
    }
}
