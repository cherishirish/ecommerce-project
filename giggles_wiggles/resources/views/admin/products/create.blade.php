@extends('layouts.admin') 

@section('content')
<div class="container">
    <form action="{{ route('product.store') }}" method="post" class="form p-5" enctype="multipart/form-data" novalidate>
        
        @csrf


        <div class="form-group mb-3">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ old('product_name') ?? '' }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Category</label><br />
            <select class="form-select custom-select" name="category_id">
            <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                    @if(old('category_id') == $category->id) 
                    selected @endif>{{ $category->category_name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price') ?? '' }}">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label> 
            <textarea class="form-control wysiwyg" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group mb-3">
            <label for="availability">Availability</label>
            <select class="form-select custom-select" name="availability">
                <option value="">Select Availability</option>
                <option value="1" @if(old('availability') == '1') selected @endif>In Stock</option>
                <option value="0" @if(old('availability') == '0') selected @endif>Out of Stock</option>
            </select>
            @error('availability')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" class="form-control" value="{{ old('quantity') ?? '' }}">
            @error('quantity')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="gender">Gender</label>
            <select class="form-select custom-select" name="gender">
                <option value="">Select Gender</option>
                <option value="F" @if(old('gender') == 'F') selected @endif>Female</option>
                <option value="M" @if(old('gender') == 'M') selected @endif>Male</option>
                <option value="G" @if(old('gender') == 'G') selected @endif>General</option>
            </select>
            @error('gender')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
</div>
@endsection
