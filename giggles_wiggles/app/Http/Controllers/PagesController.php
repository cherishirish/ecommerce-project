<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        $title = 'About Us';
        return view('about', compact('title'));
    }

   
}
