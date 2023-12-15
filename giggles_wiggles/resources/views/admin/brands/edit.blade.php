@extends('layouts.admin')

@section('content')
    

    <form action="{{ route('admin.brand.update', ['id' => $brand->id]) }}" method="POST" class="px-3">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->

        <h1>{{ $title }}</h1>

        <!-- Brand Name Field -->
        <div class="mb-3">
            <label for="brand_name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
