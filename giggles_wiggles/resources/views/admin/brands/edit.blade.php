@extends('layouts.admin')

@section('content')

    <!-- Content Row -->
    <div class="container my-3">
        
        @if(isset($brand))
        <form action="{{ route('admin.brands.update', ['id' => $brand->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $brand->id }}">
        @else
        <form action="{{ route('admin.brands.store') }}" method="POST">
            @csrf
        @endif
            <!-- Brand Name Field -->
            <div class="form-group my-3">
                <label for="brand_name" class="col-form-label text-center">Brand Name</label>
                
                <input type="text" class="form-control" name="brand_name" id="brand_name"
                value="{{ old('brand_name', $brand->brand_name ?? '') }}">
                @error('brand_name')
                <span class="text-danger">{{$message}}</span>
                @enderror   
                   
            </div>

        </form>
        <button type="submit" class="btn btn-primary">{{ isset($brand) ? 'Update' : 'Create' }}</button>
    </div>


@endsection
