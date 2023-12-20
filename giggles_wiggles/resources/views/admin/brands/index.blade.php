@extends('layouts.admin')

@section('content')
<div class="px-4 pt-5 w-100">

    <a href="{{ route('admin.brands.create') }}" class="btn btn-success mb-3">Create Brand</a> 

    <form action="{{ route('admin.brands.search') }}" method="get" style="display:flex">
        <a class="btn btn-info" href="{{route('admin.brands')}}" style="margin-right:20px;height:40px">All</a>
        <input class="form-control mr-0" type="search" name="search" 
            placeholder="Search here" aria-label="Search" 
            value="{{ request('search') }}">
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                
                <td>{{ strtoupper($brand->brand_name) }}</td>
                <td class="d-flex gap-3">
                    <a href="{{route('admin.brands.edit', ['id'=>$brand->id])}}" class="btn btn-info">Edit</a>
                    <form method="post" action="{{route('admin.brands.delete', ['id'=>$brand->id])}}" id="delete">
                        @csrf    
                        @method('DELETE')
        
                        <button class="btn btn-danger" onclick="return confirm('Do you really want to delete this brand?')" id="delete_button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>
    
@endsection


