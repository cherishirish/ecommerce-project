@extends('layouts.admin') 

@section('content')
<div class="px-4 w-100">
   

    <div class="mt-5" style="display: flex; justify-content: space-between">
        <a href="{{ route('product.create') }}" class="btn btn-success mb-3">Create Product</a>

    <form action="{{ route('admin.products.search') }}" method="get">
    <input class="form-control mr-0" type="search" name="search" 
                  placeholder="Search here" aria-label="Search" 
                  value="{{ request('search') }}">
                 
    <input class=searchButton type="submit" value="Search" hidden />
    </form>
</div>

    <table class=" mt-2 table table-bordered table-hover">
        <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>

                </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td style="display:flex; gap:10px;">
                        <a class="btn btn-primary" href="{{ route('product.edit', ['id' => $product->id]) }}">EDIT</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this product?')">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- <div class="container mt-4">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-center">{{ $product->product_name }}</h5>
                            </div>
                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->product_name }}" class="card-img-top">

                        
                            <div class="card-footer bg-light">

                                <div class="float-start">
                                    <small class="text-muted">{{ strtoupper($product->category->category_name) }}</small>
                                </div>
                                
                                <div class="float-end" style="display:flex; gap:10px;">
                                    <a href="{{ route('product.edit', ['id' => $product->id]) }}">
                                        <button class="btn btn-default btn-sm"> Edit </button>
                                    </a>

                                    <form action="{{ route('product.destroy', ['id' => $product->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-close"
                                            onclick="return confirm('Are you sure you want to delete this athlete?')"></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


                    @if($loop->iteration % 3 == 0)
                        </div><div class="row">
                    @endif
                @endforeach
            </div>
        </div> -->

</div>
@endsection
