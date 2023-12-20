@extends('layouts.admin')

@section('content')
<div class="px-4 w-100">

    <div style="display:flex;justify-content:space-between;margin-top:40px">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Create Category</a> 

        <form action="{{ route('admin.categories.search') }}" method="get" style="display:flex">
            <a class="btn btn-info" href="{{route('admin.categories')}}" style="margin-right:20px;height:40px">All</a>
            <input class="form-control mr-0" type="search" name="search" 
                placeholder="Search here" aria-label="Search" 
                value="{{ request('search') }}">
        </form>    
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                
                <td>{{ strtoupper($category->category_name) }}</td>
                <td>
                    <a href="{{route('admin.categories.edit', ['id'=>$category->id])}}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('admin.categories.delete', ['id'=>$category->id])}}" id="delete">
                        @csrf    
                        @method('DELETE')
        
                        <button class="btn btn-danger" onclick="return confirm('Do you really want to delete this category?')" id="delete_button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>
    
@endsection


