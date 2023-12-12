@extends('layouts.admin')

@section('content')
<div class="px-4 w-100">
               
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
                    <!-- <a href="{{route('admin.categories.delete', ['id'=>$category->id])}}" class="btn btn-info">Delete</a> -->
                    <form method="post" action="{{route('admin.categories.delete', ['id'=>$category->id])}}" id="delete">
                        @csrf    
                        @method('DELETE')
        
                        <button class="btn btn-danger" onclick=confirmDelete(event) id="delete_button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- <a href="{{route('admin.categories.create', ['id'=>$category->id])}}" class="btn btn-info">Create</a> -->
 
</div>
    
@endsection
