@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.brands.store') }}" method="POST" class="px-5">
        <h1>Create/Edit Brand</h1>
        @csrf
        
        <!-- Brand Name Field -->
        <div class="mb-3">
            <label for="brand_name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ old('brand_name') }}">
        
            <label for="is_nav" class="form-label">Do you want to show it on website?</label>
            <select class="form-control" id="is_nav" name="is_nav">
                <option value="0" {{ old('is_nav') == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_nav') == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        @error('brand_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
