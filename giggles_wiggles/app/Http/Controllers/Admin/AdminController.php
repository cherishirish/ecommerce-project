<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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


     /**
     * Constructing AdminController instance
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Prepares data for Admin dashboard
     *
     * @return view
     */
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