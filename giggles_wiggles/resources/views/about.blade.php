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
            <div class="col-md-6">
                <!-- About Us Text -->
                <div>
                    <h2 class="mb-4">Who We Are</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula.</p>
                </div>
            </div>

            <div class="col-md-6">
                <!-- About Us Image -->
                <img src="/images/about-image.jpg" alt="About Us Image" class="img-fluid rounded">
            </div>
        </div>

    </div>
</section>

@endsection
