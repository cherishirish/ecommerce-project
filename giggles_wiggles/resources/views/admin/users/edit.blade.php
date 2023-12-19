@extends('layouts.admin')


@section('content')

    <div class="container my-3">
            
            <form method="post" action="{{route('admin.users.update')}}" class="form" enctype="multipart/form-data" novalidate class="px-3">
                @method('PUT')
                @csrf
                <div class="form-group my-3">
                    <label for="id" class="mb-2">ID</label>
                    <input type="text" class="form-control" name="id" id="id" aria-describedby="emailHelp"
                    value="{{ old('id', $user->id) }}">
                    @error('id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                  
                </div>
                <div class="form-group my-3">
                    <label for="first_name" class="mb-2">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="emailHelp"
                    value="{{ old('first_name', $user->first_name) }}">
                    @error('first_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                      
                </div>
                <div class="form-group my-3">
                    <label for="last_name" class="mb-2">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="emailHelp"
                    value="{{ old('last_name', $user->last_name) }}">
                    @error('last_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                            
                </div>
                <div class="form-group my-3">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    value="{{ old('email', $user->email) }}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                      
                </div>
                <div class="form-group my-3">
                    <label for="address" class="mb-2">Address</label>
                    <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp"
                    value="{{ old('address', $user->billingAddress->address) }}">
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                      
                </div>
                <div class="form-group my-3">
                    <label for="city" class="mb-2">City</label>
                    <input type="text" class="form-control" name="city" id="city" aria-describedby="emailHelp"
                    value="{{ old('city', $user->billingAddress->city) }}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                      
                </div>
                <div class="form-group my-3">
                    <label for="province" class="mb-2">Province</label>
                    <input type="text" class="form-control" name="province" id="province" aria-describedby="emailHelp"
                    value="{{ old('province', $user->billingAddress->province) }}">
                    @error('province')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                      
                </div>
                <div class="form-group my-3">
                    <label for="postal_code" class="mb-2">Postal Code</label>
                    <input type="text" class="form-control" name="postal_code" id="postal_code" aria-describedby="emailHelp"
                    value="{{ old('postal_code', $user->billingAddress->postal_code) }}">
                    @error('postal_code')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                      
                </div>
                <div class="form-group my-3">
                    <label for="is_admin" class="mb-2">Admin Status</label>
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
        </div>
    </div>      
    
    @endsection