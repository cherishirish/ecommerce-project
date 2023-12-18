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
                <div class="form-container">
                    <h2>Edit Baby Registry</h2>
                    <form action="{{ route('registry.update', $registry->id) }}" method="post">
                        @csrf
                        @method('PUT') 
                        
                        <div class="form-group">
                            <label for="registryName">Registry Name:</label>
                            <input type="text" id="registryName" name="registryName" value="{{ $registry->registryName }}" required>
                        </div>

                        <div class="form-group">
                            <label for="eventDate">Event's Due Date:</label>
                            <input type="date" id="eventDate" name="eventDate" value="{{ $registry->eventDate }}" required>
                        </div>

                        <h1>Select Products for Your Registry</h1>

                        @foreach ($products as $product)
                            <div>
                                <label>
                                    <input type="checkbox" name="product_ids[]" value="{{ $product->id }}"
                                        {{ in_array($product->id, json_decode($registry->product_ids, true)) ? 'checked' : '' }}>
                                        {{ $product->product_name }} - {{ $product->price }}
                                </label>
                            </div>
                        @endforeach


                        <div class="form-group">
                            <input type="submit" value="Update Registry">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
