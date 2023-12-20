@extends('layouts.frontend')

@section('content')

<section class="py-3">
        <div class="container px-4 px-lg-5">
        <!-- Main Content Header Image-->
        <div class="main-header mb-3">
            <img src="/images/breadcrumb.jpg" alt="">
        </div>

        <nav aria-label="breadcrumb">
            <ol id="breadcrumb" class="breadcrumb">
                <li class="breadcrumb-item"><a class="pr-1 text-dark" href="{{ route('home') }}">Home</a> | {{ $categoryName }}</li>
            </ol>
        </nav>




            <div class="row gx-4 gx-lg-5 align-items-center">                
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                    src="/images/products/{{ $product->image }}" alt="{{ $product->product_name }}" /></div>
                <div class="col-md-6">      
                    <div class="small mb-1">{{ $product->brand->brand_name }}</div>
                    <h1 class="display-5 fw-bolder">{{ $product->product_name }}</h1>
                    <div class="fs-5 mt-3 mb-3 text-danger">
                        $ {{ $product->price}}
                    </div>
                    <p class="text-md">{{ $product->description }}</p>





            <div class="d-flex align-items-center">
                <form id="product-addtocart" action="{{ route('cart.add') }}" method="post" class="d-flex align-items-center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input class="form-control text-center me-2" id="inputQuantity" 
                        type="number" name="quantity" placeholder="1" 
                        style="max-width: 3.5rem;" value="{{ old('quantity', 1) }}" min="1" />
                    <button class="btn btn-outline-dark m-2" type="submit" name="add_to_cart">+</button>
                </form>   
            </div>







                </div>
            </div>
        </div>
    </section>
   
@endsection
