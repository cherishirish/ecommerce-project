@extends('layouts.frontend')

@section('content')
<section class="py-3">
    <div class="container px-4 px-lg-5">

        <!-- Main Content Header Image-->
        <div class="main-header mb-5">
            <img src="images/breadcrumb.jpg" alt="Header Image">
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

                    <div class="container mt-4">
                        <div class="row">
                    
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


                        @if($searchTerm && $registry->isNotEmpty())
                            <h4>Search Result</h4>
                            @foreach ($registry as $registry)
                            <div class="col-md-4 col-12 mb-4 mt-4">
                                <div id="registry-card" class="card">
                                         <!-- I USE STR_PAD TO POPULATE THE ID WITH ZERO OF THE REGISTRY ID -->
                                        <div style="display:flex; justify-content: space-between; align-items: baseline; width: 100%;">
                                                <p class="card-subtitle">DEFAULT REGISTRY # {{ date('Y') }}-{{ $registry->id }}</p>
                                            
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
                            @endforeach
                        @elseif($searchTerm)
                            <p class="text-center">No registries found.</p>
                        @endif






                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
@endsection
