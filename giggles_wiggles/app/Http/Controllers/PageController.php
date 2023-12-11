<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    function index() {
        $title = "Home";
        return view('/home', compact('title'));
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
