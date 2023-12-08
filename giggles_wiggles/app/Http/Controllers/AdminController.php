<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = User::where('is_admin', 0)->get();
        $admin = User::where('is_admin', 1)->get();
        $title = "Admin Dashboard";
        return view('admin/index', compact('title', 'customers', 'admin'));
    }

    public function users()
    {
        $title = "Users CRUD";
        $users = User::all();
        $addresses = Address::all();
        return view('admin/users', compact('title', 'users', 'addresses'));
    }

    public function edit($id)
    {
        $title = "Edit User";
        $user = User::where('id', $id)->get();
        return view('admin.users.edit', compact('title', 'user'));
    }
}