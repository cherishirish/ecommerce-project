<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $title = "Create Category";
        $categories = Category::all();
        return view('admin/categories/index', compact('title', 'categories'));
    }

}
