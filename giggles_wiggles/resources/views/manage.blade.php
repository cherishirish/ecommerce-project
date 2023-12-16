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


                <div>
                    <h2>Registry Table</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Registry Name</th>
                                        <th>Event Date</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registries as $registry)
                                        <tr>
                                            <td>{{ $registry->registryName }}</td>
                                            <td>{{ $registry->eventDate }}</td>
                                            <td>
                                                <a href="{{ route('registry.show', $registry->id) }}">View</a>
                                                <a href="{{ route('registry.edit', $registry->id) }}">Edit</a>
                                                <form action="{{ route('registry.delete', $registry->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this registry?')">X</button>
                                                </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</section>

@endsection