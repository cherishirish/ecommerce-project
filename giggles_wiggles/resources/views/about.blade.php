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
                <li class="breadcrumb-item"><a class="pr-1 text-dark" href="{{ route('home') }}">Home</a> | {{ $title }}</li>
            </ol>
        </nav>

        <!-- About Us Section -->
        <div class="row gx-4 gx-lg-5 align-items-center">
            
            <div class="col-md-6 pb-3 pb-md-0">
                <!-- About Us Image -->
                <img src="/images/about.jpg" alt="About Us Image" class="img-fluid rounded">
            </div>

            <div class="col-md-6">
                <!-- About Us Text -->
                <div>
                    <h2 class="mb-4">Welcome to Our Baby Haven</h2>
                    <p class="lead">At Giggles Wiggles, we understand the joy and responsibility that comes with parenthood. Our mission is to provide you with the finest selection of baby products that ensure the comfort, safety, and happiness of your little ones.</p>
                    <p>As parents ourselves, we know the importance of choosing the right products for your baby. That's why we've curated a collection of high-quality, adorable, and functional items to make every moment with your baby special.</p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
