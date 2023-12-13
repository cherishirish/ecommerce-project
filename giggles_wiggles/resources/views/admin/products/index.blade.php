@extends('layouts.app')

@section('content')

<div class="mt-5" style="display: flex; justify-content: space-between">
            <a href="{{ route('admin.create') }}" class="btn btn-outline-dark float-start me-5">Add Athlete</a>


            <form action="{{ route('admin.search') }}" method="post" class="form-inline pe-2 flex-end">
            @csrf
            <input class="p-1 mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>

        


        <div class="container mt-4">
            <div class="row">
                @foreach($athletes as $athlete)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="/admin/athletes/{{ $athlete->id }}" class="text-decoration-none">
                            <img src="{{ asset('images/' . $athlete->image) }}" alt="{{ $athlete->name }}" width="300" height="500" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $athlete->name }}</h5>
                            </div>
                            <div class="card-footer bg-light">


                                <div class="float-start">
                                    <small class="text-muted">{{ $athlete->sport }}</small>
                                </div>
                                
                                <div class="float-end" style="display:flex; gap:10px;">
                                    <a href="edit/{{ $athlete->id }}">
                                        <button class="btn btn-default btn-sm"> Edit </button>
                                    </a>

                                    <form action="{{ route('admin.destroy', $athlete->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-close"
                                            onclick="return confirm('Are you sure you want to delete this athlete?')"></button>
                                    </form>

                                    
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

@endsection