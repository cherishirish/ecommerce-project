@extends('layouts.admin')

@section('content')
    

    <form action="{{ route('admin.categories.store') }}" method="POST" class="px-5">
    <h1>Create/Edit Category</h1>
        @csrf
        <!-- Id Field -->
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}">
        </div>

        <!-- Category Name Field -->
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
