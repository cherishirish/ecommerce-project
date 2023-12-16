@extends('layouts.admin')

    @section('content')

    <div>
        <a href="{{route('admin.users.create')}}" class="btn btn-primary">Create User</a>
    <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Billing Address</th>
                                    <th>Shipping Address</th>
                                    <th>Admin Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
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
                                        @foreach($addresses as $address)
                                            @if($address->customer_id == $user->id && $address->address_type == 'billing')
                                        {{$address->address}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($addresses as $address)
                                            @if($address->customer_id == $user->id && $address->address_type == 'shipping')
                                        {{$address->address}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($user->is_admin == 0)
                                        Non-admin
                                        @else 
                                        Admin
                                        @endif
                                    </td>
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td>
                                        {{$user->updated_at}}
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('admin.users.delete', ['id'=>$user->id])}}" id="delete">
                                        @csrf    
                                        @method('DELETE')
                            
                                        <button class="btn btn-danger" onclick=confirmDelete(event) id="delete_button">Delete</button>
                                        </form>

                                        <a href="{{route('admin.users.edit', ['id'=>$user->id])}}" class="btn btn-info">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
    </div>

                        

                    @endsection
