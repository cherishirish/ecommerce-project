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


        
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-12 pt-5 pt-md-0">
                <!--  -->
                <div class="card">
                    <div class="form-container" id="registry-form">
                        <h4 class="card-title mt-3 mb-3 text-center">Registrant Information</h4>
                        <p class="mb-5 text-center">Friends and family will be able to search for your registry by registrant name.</p>
                        
                        <form action="{{ route('registry.store') }}" method="post">
                            @csrf
                            <div class="row info">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name:</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="registryName">Registry Name:</label>
                                        <input type="text" class="form-control" id="registryName" name="registryName" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="eventDate">Event's Date:</label>
                                        <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                                    </div>
                                </div>
                            </div>

                            
                            <h4 class="mt-3 mb-3 text-center">Select Products for Your Registry</h4>


        
                        <div class="container mt-4">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            
                                            <!-- <div class="card-header">
                                            </div> -->
                                            
                                            
                                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->product_name }}" class="card-img-top">

                                            <div class="card-footer bg-light">

                                                <div class="float-start">
                                                    {{ $product->product_name }} - {{ $product-> price }}
                                                </div>
                                                
                                                <div class="float-end">
                                                <input type="checkbox" class="form-check-input" name="product_ids[]" value="{{ $product->id }}"
                                                                    {{ isset($selectedProducts) && in_array($product->id, $selectedProducts) ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            @if($loop->iteration % 3 == 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                </div>
                            

                            

                  <!-- <div class="prod">
                    @foreach ($products as $product)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="product_ids[]" value="{{ $product->id }}"
                                {{ isset($selectedProducts) && in_array($product->id, $selectedProducts) ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $product->product_name }} - {{ $product->price }}
                            </label>
                        </div>
                    @endforeach
                </div> -->     








                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">Create Registry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
