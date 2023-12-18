@extends('layouts.frontend')

@section('content')
<div class="main-content">
    <!-- MAIN CONTENT -->
    <div class="list-mainclass= py-5">
        <div class="container px-4 px-lg-5">
            <!-- Main Content Header Image-->
            <div class="main-header mb-5">
                <img src="images/breadcrumb.jpg" alt="Header Image">
            </div>



            <nav aria-label="breadcrumb">
                <ol id="breadcrumb" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @if (!empty($categoryName))
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('product.index', ['category_id' => $category_id]) }}">{{ $categoryName }}</a></li>
                    @endif
                </ol>
            </nav>




            <!-- Display Search Results or All Products -->
            <h2 style="margin-bottom: 30px;">{{ isset($results) ? 'Search Results' : 'All Products' }}</h2>

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
                                            <p class="text-sm text-muted p-0 m-0">Brand</p>
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
                                <div class="card-footer p-3 border-top-0 bg-transparent">
                                    <!-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div> -->
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
