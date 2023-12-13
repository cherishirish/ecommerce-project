@extends('layouts.admin') 

@section('content')
<div class="px-4 w-100">
    <a href="{{ route('product.create') }}" class="btn btn-success mb-3">Create Product</a>

    <table class=" mt-2 table table-bordered table-hover">
        <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>

                </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('products.edit', ['id' => $product->id]) }}">EDIT</a>
                        <a class="btn btn-danger" href="#" onclick="confirmDelete(<?=e($product['id']) ?>)">DELETE</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
