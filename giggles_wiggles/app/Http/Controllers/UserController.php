<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $title = "Users CRUD";
        $users = User::all();
        $addresses = Address::all();
        return view('admin/users/index', compact('title', 'users', 'addresses'));
    }

    public function edit($id)
    {
        $title = "Edit User";
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', compact('title', 'user'));
    }
}
