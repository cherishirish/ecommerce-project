@extends('layouts.frontend')

@section('content')

<section class="py-5">
        <div class="container px-4 px-lg-5">
        <div class="main-header mb-5">
            <img src="/images/jose-jovena-M70eJ8KGcZs-unsplash.jpg" alt="">
        </div>


        <nav aria-label="breadcrumb">
            <ol id="breadcrumb" class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @if (!empty($categoryName))
                    <li class="breadcrumb-item">
                        <a href="{{ route('product.index', ['category_id' => $product->category_id]) }}">{{ $categoryName }}</a>
                    </li>
                @endif
            </ol>
        </nav>




            <div class="row gx-4 gx-lg-5 align-items-center">                
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                    src="/images/products/{{ $product->image }}" alt="{{ $product->product_name }}" /></div>
                <div class="col-md-6">      
                    <div class="small mb-1">BRAND</div>
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
