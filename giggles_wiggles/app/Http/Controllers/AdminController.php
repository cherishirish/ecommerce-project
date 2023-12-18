<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Order;
use App\Models\Product;

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
        $customers = User::where('is_admin', 0)->get();
        $admin = User::where('is_admin', 1)->get();
        $orders = Order::all();
        $products = Product::all();
        return view('admin/index', compact('title', 'customers', 'admin', 'orders', 'products'));
    }

    
}