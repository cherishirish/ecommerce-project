@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="POST" class="px-5">
        <h1>Create/Edit Category</h1>
        @csrf

        
        <!-- Category Name Field -->
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name') }}">
        
            <label for="is_nav" class="form-label">Do you want to show it on website?</label>
            <select class="form-control" id="is_nav" name="is_nav">
                <option value="0" {{ old('is_nav') == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_nav') == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

       

        @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
