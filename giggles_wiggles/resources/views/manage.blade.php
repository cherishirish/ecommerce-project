@extends('layouts.frontend')

@section('content')


<section class="py-3">
    <div class="container px-4 px-lg-5">

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
                
                <h2 class="text-center">Make Your Special Occasion Unforgettable</h2>
                <p class="text-center">Let your loved ones make your day even more special by sharing your wish list of the must-have items you truly desire and need!</p>

                <div class="row">
                @php
                    $userId = Auth::id();
                    $filteredRegistries = $registries->filter(function($registry) use ($userId) {
                        return $registry->user_id == $userId;
                    });
                    @endphp

                    @foreach ($filteredRegistries as $registry)
                    
                    <div class="col-md-4 col-12 mb-4 mt-4">
                        <div id="registry-card" class="card">

                                @if(!$registry->is_default)
                                    
                                    <form action="{{ route('registry.set_default', $registry->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn" style="font-size:10px;">SET AS DEFAULT</button>
                                    </form>
                                @else
                                  
                                        <button class="btn" style="font-size:12px; font-weight:400; color:#E8A2A6; border:none;" disabled>CURRENT DEFAULT REGISTRY</button>
                                @endif
                                
                                <div style="display:flex; justify-content: space-between; align-items: baseline; width: 100%;">
                                        <p class="card-subtitle">DEFAULT REGISTRY # {{ date('Y') }}-{{ $registry->id }}</p>
                                        <form action="{{ route('registry.delete', $registry->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"class="btn btn-sm btn-close"
                                                onclick="return confirm('Are you sure you want to delete this registry?')"></button>
                                        </form>
                                </div>
                                <h4 class="card-title mt-1">{{ $registry->registryName }}</h4>
                                <p class="card-text">
                                    Registrant: <strong>{{ $registry->user->first_name }} {{ $registry->user->last_name }}</strong><br>
                                    Event Date: {{ (new DateTime($registry->eventDate))->format('M d, Y') }}
                                </p>

                                <div>
                                    <a href="{{ route('registry.show', $registry->id) }}" class="btn btn-outline-danger">View Registry</a>
                                    <a href="{{ route('registry.edit', $registry->id) }}" class="btn btn-primary">Edit Registry Info</a>
                                </div>  
                            </div>
                        </div>      
                    
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

@endsection