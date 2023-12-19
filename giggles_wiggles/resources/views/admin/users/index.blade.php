@extends('layouts.admin')

    @section('content')

    <div class="px-4 pt-5 w-100">

        <div class="mt-5" style="display: flex; justify-content: space-between; margin-bottom:20px">
            <a href="{{route('admin.users.create')}}" class="btn btn-success">Create User</a>

            <form action="{{ route('admin.users.search') }}" method="get" style="display:flex">
                <a class="btn btn-info" href="{{route('admin.users')}}" style="margin-right:20px;">All</a>
                <input class="form-control mr-0" type="search" name="search" 
                    placeholder="Search here" aria-label="Search" 
                    value="{{ request('search') }}">
            </form>
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Billing Address</th>
                        <th>Shipping Address</th>
                        <th>Admin Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users->sortByDesc('updated_at') as $user)
                    <tr>
                        <td>
                            {{$user->id}}
                        </td>
                        <td>
                            {{$user->first_name}}
                        </td>
                        <td>
                            {{$user->last_name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            @foreach($billing_addresses as $ba)
                                @if($ba->user_id == $user->id)
                                {{$ba->address}}<br>
                                {{$ba->city}}, {{$ba->province}}<br>
                                {{$ba->postal_code}}
                                @endif
                            @endforeach
                        </td>
                        <td>       
                            
                        </td>
                        <td>
                            @if($user->is_admin == 0)
                            Non-admin
                            @else 
                            Admin
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{route('admin.users.edit', ['id'=>$user->id])}}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('admin.users.delete', ['id'=>$user->id])}}" id="delete">
                            @csrf    
                            @method('DELETE')
                
                            <button class="btn btn-danger" onclick=confirmDelete(event) id="delete_button">Delete</button>
                            </form>  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

    @endsection
