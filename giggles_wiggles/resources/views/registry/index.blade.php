@extends('layouts.frontend')

@section('content')

<section class="py-3">
    <div class="container px-4 px-lg-5">

        <!-- Main Content Header Image-->
        <div class="main-header mb-3">
            <img src="/images/jose-jovena-M70eJ8KGcZs-unsplash.jpg" alt="">
        </div>

        <nav aria-label="breadcrumb">
            <ol id="breadcrumb" class="breadcrumb">
                <li class="breadcrumb-item"><a class="pr-1 text-dark" href="{{ route('home') }}">Home</a> | {{ $title }}</li>
            </ol>
        </nav>


        
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-12 pt-5 pt-md-0">
                <!--  -->
                <div>
                    <div class="main-header mb-5">
                        <img src="images/breadcrumb.jpg" alt="Header Image">
                    </div>


                        <h2 class="text-center">Make Your Special Occasion Unforgettable</h2>
                        <p class="text-center">Let your loved ones make your day even more special by sharing your wish list of the must-have items you truly desire and need!</p>

                    <div class="clearfix">
                        <div class="registry-section">
                            <div class="registry-title">Create a Registry</div>
                            <div class="registry-description">It's easy to start your parenting journey with a wish list.</div>
                            <a href="{{ route('registry.create') }}" class="registry-link">Create ></a>
                        </div>
                    
                        <div class="registry-section">
                            <div class="registry-title">Manage a Registry</div>
                            <div class="registry-description">Add, remove or change items and share with friends and family.</div>
                            <a href="{{ route('manage') }}" class="registry-link">Manage ></a>
                        </div>
                    
                        <div class="registry-section">
                            <div class="registry-title">Find a Registry</div>
                            <div class="registry-description">Search by a parent's name or code to see their wish list.</div>
                            <a href="{{ route('registry.search') }}" class="registry-link">Find ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection