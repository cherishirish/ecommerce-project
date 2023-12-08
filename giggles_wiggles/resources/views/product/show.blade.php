@extends('layouts.frontend')

@section('content')

<section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
              
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                    src="/images/bugaboo-dragonfly-complete-stroller-graphite-frame-black-skylineblue4.webp" alt="..." /></div>
                <div class="col-md-6">      
                    <div class="small mb-1">BRAND</div>
                    <h1 class="display-5 fw-bolder">{{ $products->product_name }}</h1>
                    <div class="fs-5 mt-3 mb-3 text-danger">
                        $ {{ $products->price}}
                    </div>
                    <p class="text-md">{{ $products->description }}</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            +
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection
