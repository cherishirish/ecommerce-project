@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST" class="px-3">
        @csrf
        @method('PATCH') <!-- Use PATCH method for updating -->

        <h1>Edit Category</h1>

        <!-- Id Field -->
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $category->id }}" readonly>
        </div>

        <!-- Category Name Field -->
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
