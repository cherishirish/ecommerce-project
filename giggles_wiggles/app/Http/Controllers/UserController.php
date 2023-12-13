<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


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

    public function update(Request $request)
    {
        $valid=$request->validate([
            'id' => 'required|integer',
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'required|email',
            'is_admin' => 'required'
        ]);

        $user = User::find($valid['id']);

        $user->update($valid);

        return redirect(route('admin.users'))->with('success', 'You have successfully edited a user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.users'))->with('success', 'You have successfully deleted a user');
    }

    public function create()
    {
        $title = "Create User";
        $users = User::all();
        $admin = Auth::user();
        return view('admin/users/create', compact('title', 'users', 'admin'));
    }

    public function store(Request $request)
    {
        $valid=$request->validate([
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'required|email',
            'password' =>'required',
            'is_admin' => 'required'
        ]);

        $valid_address=$request->validate([
            'address' => 'required|string|min:1|max:255',
            'city' => 'required|string|min:1|max:255',
            'province' => 'required|string|min:1|max:255',
            'postal_code' => 'required|string|min:1|max:255',
            'address_type' => 'required'
        ]);

        $user = User::create($valid);

        $user->save();

        $valid_address['user_id'] = $user['id'];

        $address = Address::create($valid_address);

        $address->save();

        return redirect(route('admin.users'))->with('success', 'You have successfully created a user');
    }

}
