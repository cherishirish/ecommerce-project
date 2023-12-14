@extends('layouts.admin')

                    @section('content')
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create User</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <form method="post" action="{{route('product.store')}}" class="form" enctype="multipart/form-data" novalidate style="width:50%">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="emailHelp"
                                value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="emailHelp"
                                value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                            
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input autocomplete="off" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                                value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="email" class="form-control" name="address" id="address" aria-describedby="emailHelp"
                                value="{{old('address')}}">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="email" class="form-control" name="city" id="city" aria-describedby="emailHelp"
                                value="{{old('city')}}">
                                @error('city')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="province">Province</label>
                                <select class="custom-select" id="province" name="province">
                                <option value="MB" >MB</option>
                                <option value="SK" >SK</option>
                                <option value="AB" >AB</option>
                                <option value="BC" >BC</option>
                                <option value="NS" >NS</option>
                                <option value="NB" >NB</option>
                                <option value="QC" >QC</option>
                                <option value="ON" >ON</option>
                                <option value="YT" >YT</option>
                                <option value="NT" >NT</option>
                                <option value="NU" >NU</option>
                                <option value="NL" >NL</option>
                                <option value="PE" >PE</option>
                                </select>
                                @error('province')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="postal_code" class="form-control" name="postal_code" id="postal_code" aria-describedby="emailHelp"
                                value="{{ old('province') }}">
                                @error('postal_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                >
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                      
                            </div>
                            <div class="form-group">
                                <label for="is_admin">Admin Status</label>
                                <select class="custom-select" id="admin_status" name="is_admin">
                                <option value=0 >Non-Admin</option>
                                <option value="1" >Admin</option>
                                </select>
                                @error('is_admin')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror 
                            </div>
                            <div>
                                <input type="hidden" name="address_type" id="address_type" value="billing">

                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                           
                        </form>
                    
                        @endsection
                    