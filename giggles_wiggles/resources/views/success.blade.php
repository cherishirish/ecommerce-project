
@extends('layouts.frontend')

@section('content')
    <section class="py-3">
        <!-- Main Content Header Image-->
        <div class="main-header mb-3">
            <img src="/images/jose-jovena-M70eJ8KGcZs-unsplash.jpg" alt="">
        </div>

        <nav aria-label="breadcrumb">
            <ol id="breadcrumb" class="breadcrumb">
                <li class="breadcrumb-item"><a class="pr-1 text-dark" href="{{ route('home') }}">Home</a> | {{ $title }}</li>
            </ol>
        </nav>
        
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-12">
                    <h2>Thank you for your submission!</h2>
                    <p>Your message has been received. We will get back to you soon.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
