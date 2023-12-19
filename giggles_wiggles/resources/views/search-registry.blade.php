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


                    
                        <h2 class="text-center mb-3">Search Registries</h2>
                        <div id="search-input" class="mb-5">
                            <form action="{{ route('registry.search') }}" method="GET">
                                <div class="form-group d-flex">
                                    <label for="search">Enter Registry Number:</label>
                                    <input type="text" class="form-control" id="search" name="search" value="{{ $searchTerm ?? '' }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Search</button>
                            </form>
                        </div>

                        @if(!isset($searchTerm))
                            <h4>Search Result</h4>
                            
                            @forelse ($registries as $registry)
                            <div class="col-md-3 col-12 mb-4 mt-4">
                                <div id="registry-card" class="card">
                                    <!-- I USE STR_PAD TO POPULATE THE ID WITH ZERO OF THE REGISTRY ID -->
                                        <div style="display:flex; justify-content: space-between; align-items: baseline; width: 100%;">
                                                <p class="card-subtitle">DEFAULT REGISTRY # {{ date('Y') }}{{ str_pad($registry->id, 3, '0', STR_PAD_LEFT) }}</p>
                                                <form action="{{ route('registry.delete', $registry->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"class="btn btn-sm btn-close"
                                                        onclick="return confirm('Are you sure you want to delete this product?')"></button>
                                                </form>
                                        </div>
                                        <h4 class="card-title mt-1">{{ $registry->registryName }}</h4>
                                        <p class="card-text">
                                            Registrant: <strong>{{ $registry->user->first_name }} {{ $registry->user->last_name }}</strong><br>
                                            Event Date: {{ (new DateTime($registry->eventDate))->format('M d, Y') }}
                                        </p>

                                        <div>
                                            <a href="{{ route('registries.public', $registry->id) }}" class="btn btn-outline-danger">View Registry</a>
                                        </div>  
                                </div>
                                
                            </div>
                            @empty
                                <p>No registries found.</p>
                            @endforelse
                        @endif
                    </div>
@endsection
