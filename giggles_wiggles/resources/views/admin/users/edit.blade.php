@extends('layouts.admin')


@section('content')
    <!-- Page Heading -->
 

    <!-- Content Row -->
    <div class="row">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    </div>

        <form method="post" action="{{route('admin.users.update')}}" class="form" enctype="multipart/form-data" novalidate style="width:50%">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="emailHelp"
                value="{{ old('id', $user->id) }}">
                @error('id')
                    <span class="text-danger">{{$message}}</span>
                @enderror                  
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="emailHelp"
                value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror                      
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="emailHelp"
                value="{{ old('last_name', $user->last_name) }}">
                @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror                            
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                value="{{ old('email', $user->email) }}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror                      
            </div>
            <div class="form-group">
                <label for="is_admin">Admin Status</label>
                <select class="custom-select" id="admin_status" name="is_admin">
                <option value=0 <?php if($user->is_admin == 0) : ?>selected <?php endif ?>>Non-Admin</option>
                <option value="1" <?php if($user->is_admin == 1) : ?>selected <?php endif ?>>Admin</option>
                </select>
                @error('is_admin')
                    <span class="text-danger">{{$message}}</span>
                @enderror 
            </div>
            
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        
    @endsection
