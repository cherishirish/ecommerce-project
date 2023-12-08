@extends('layouts.frontend')

@section('content')
    <div class="main-content">
        <!-- MAIN CONTENT -->
        <div class="list-mainclass= py-5">
            <div class="container px-4 px-lg-5">
                <!-- Main Content Header Image-->
                <div class="main-header mb-5">
                    <img src="images/jose-jovena-M70eJ8KGcZs-unsplash.jpg" alt="">
                </div>


                <!-- Display Categories -->
            
                
                <div class="row gx-4 gx-md-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
                    @foreach($products as $product)
                        <div class="card-container col mb-5">
                            <div class="card h-100 border-0 p-0">
                                <!-- Product image-->
                                <a href="/apparel/{{ $product->id }}">
                                    <img class="card-img-top" src="images/bugaboo-dragonfly-complete-stroller-graphite-frame-black-skylineblue4.webp" alt="..." />
                                </a>
                                <!-- Product details-->
                                <div class="card-body pl-3 ">
                                    <div>
                                        <!-- Product brand-->
                                        <p class="text-sm text-muted p-0 m-0">Brand</p>
                                        <!-- Product name-->
                                        <h5 class="fw-bolder p-0 m-0">{{ $product->product_name }}</h5>
                                        <!-- Product price-->
                                        <p class="price">$ {{ $product->price }}</p>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-3 border-top-0 bg-transparent">
                                    <!-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection
