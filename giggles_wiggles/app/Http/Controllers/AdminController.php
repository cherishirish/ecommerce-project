<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Admin Dashboard";
<<<<<<< HEAD
        return view('admin/index', compact('title', 'customers', 'admin'));
    }

    
=======
        return view('admin/index', compact('title'));
    }
>>>>>>> 2d82f84c19589600ebdb2d11943a476f26d1a4b5
}