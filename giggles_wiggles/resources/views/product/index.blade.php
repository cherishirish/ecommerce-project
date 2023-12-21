@extends('layouts.frontend')

@section('content')
<div class="main-content">
    <!-- MAIN CONTENT -->
    <div class="list-mainclass py-3">
        <div class="container px-4 px-lg-5">
            <!-- Main Content Header Image-->
            <div class="main-header mb-5">
                <img src="/images/breadcrumb.jpg" alt="Header Image">
            </div>



            <nav aria-label="breadcrumb">
                <ol id="breadcrumb" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @if (isset($category_id) && !empty($categoryName))
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('product.index', ['category_id' => $category_id]) }}">{{ $categoryName }}</a></li>
                    @endif
                </ol>
            </nav>




            <!-- Display Search Results or All Products -->
            <div style="display:flex;   justify-content: space-between;">
                <h2 style="margin-bottom: 30px;">{{ isset($results) ? 'Search Results' : 'All Products' }}</h2>

                <!-- Add this where you want the dropdown to appear -->
                <form action="{{ route('product.index') }}" method="get">
                    <select name="sort" onchange="this.form.submit()">
                        <option value="">Sort by</option>
                        <option value="name_asc">Name: A-Z</option>
                        <option value="name_desc">Name: Z-A</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="brand">Brand</option>
                    </select>
                    <input type="hidden" name="category_id" value="{{ $category_id ?? '' }}">

                </form>

            </div>
            



            @if(isset($results) && $results->isEmpty())
                <p>No results found for "{{ request('search') }}"</p>
            @else
                <!-- Define $searchQuery variable if it's in the request -->
                @php
                    $searchQuery = request('search');
                @endphp

                <div class="row gx-4 gx-md-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                    @foreach(isset($results) ? $results : $products as $product)
                        <div class="card-container col mb-5">
                            <div class="card h-100 border-0 p-0">
                                <!-- Product image -->
                                <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                    <img class="card-img-top" src="/images/products/{{ $product->image }}" alt="{{  $product->product_name }}" />
                                </a>
                                <!-- Product details -->
                                <div class="card-body pl-3">
                                    <div id="item_info">
                                        <div>
                                            <!-- Product brand -->
                                            <p class="text-sm text-muted p-0 m-0">{{ $product->brand->brand_name }}</p>
                                            <!-- Product name -->
                                            <h5 class="fw-bolder p-0 m-0">{{ $product->product_name }}</h5>
                                            <!-- Product price -->
                                            <p class="price">$ {{ $product->price }}</p>
                                            
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <form id="product-addtocart" action="{{ route('cart.add') }}" method="post" class="d-flex align-items-center">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button class="btn m-2 cart_button" type="submit" name="add_to_cart"><i class="fas fa-shopping-cart cart_logo"></i></button>
                                            </form>   
                                        </div>
                                    </div> 
                                </div>
                                <!-- Product actions -->
                                <div class="card-footer p-0 mt-5 bg-light">
                                    <form action="{{ route('registry.add', $product->id) }}" method="POST">
                                        @csrf
                                        
                                        <button type="submit" class="btn float-end" style="font-size:12px">ADD TO REGISTRY</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
