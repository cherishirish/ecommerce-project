@extends('layouts.admin')

@section('content')
<div class="px-4 w-100">

    <a href="{{ route('admin.brands.create') }}" class="btn btn-success mb-3">Create Brand</a> 

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                
                <td>{{ strtoupper($brand->brand_name) }}</td>
                <td>
                    <a href="{{route('admin.brands.edit', ['id'=>$brand->id])}}" class="btn btn-info">Edit</a>
                </td>
                <td>
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


