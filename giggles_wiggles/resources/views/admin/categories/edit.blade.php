@extends('layouts.admin')

@section('content')
    

    <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST" class="px-3">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->

        <h1>{{ $title }}</h1>

        <!-- Category Name Field -->
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
