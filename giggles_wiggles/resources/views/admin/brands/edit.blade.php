@extends('layouts.admin')

@section('content')
    
<!-- Page Heading -->
<div class="px-4 w-100">
    <h1>{{ $title }}</h1>

    <!-- Content Row -->
    <div class="container my-3">
        
        @if(isset($brand))
        <form action="{{ route('admin.brands.update', ['id' => $brand->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $brand->id }}">
        @else
        <form action="{{ route('admin.brands.store') }}" method="POST" class="px-3">
            @csrf
        @endif
            <!-- Brand Name Field -->
            <div class="form-group row my-4">
                <label for="brand_name" class="col-sm-2 col-form-label text-center">Brand Name</label>
                <div class="col-sm-10">
                        <input type="text" class="form-control" name="brand_name" id="brand_name"
                        value="{{ old('brand_name', $brand->brand_name ?? '') }}">
                        @error('brand_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                </div>     
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($brand) ? 'Update' : 'Create' }}</button>
        </form>
    </div>

</div>
@endsection
