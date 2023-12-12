@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>

    <table class="table">
        <!-- Table headers -->

        @foreach ($categories as $category)
            <tr>
                <!-- Display category data -->
            </tr>
        @endforeach
    </table>
@endsection
