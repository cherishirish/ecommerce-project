@extends('layouts.admin') 

@section('content')
<div class="container">
    <form action="{{ route('product.update',['id' => $product->id]) }}" method="post" class="form p-5" enctype="multipart/form-data" novalidate>
        
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="form-group mb-3">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ old('product_name') ?? $product->product_name }}">
            @error('product_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Category</label><br />
            <select class="form-select custom-select" name="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ (old('category_id') == $category->id || (isset($product) && $product->category_id == $category->id)) ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price') ?? $product->price }}">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label> 
            <textarea class="form-control wysiwyg" id="description" name="description">{{ old('description') ??  $product->description  }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group mb-3">
            <label for="availability">Availability</label>
            <select class="form-select custom-select" name="availability">
                <option value="">Select Availability</option>
                <option value="1" {{ (old('availability') == '1' || (isset($product) && $product->availability == '1')) ? 'selected' : '' }}>In Stock</option>
                <option value="0" {{ (old('availability') == '0' || (isset($product) && $product->availability == '0')) ? 'selected' : '' }}>Out of Stock</option>
            </select>
            @error('availability')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" class="form-control" value="{{ old('quantity') ??  $product->quantity  }}">
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

            @if(isset($product) && $product->image)
                <div class="mt-2">
                    <label for="current_image">Current Image:</label><br>
                    <span>{{ $product->image }}</span>
                </div>
            @endif
        </div>


        <div class="form-group mb-3">
            <label for="gender">Gender</label>
            <select class="form-select custom-select" name="gender">
                <option value="">Select Gender</option>
                <option value="F" {{ (old('gender') == 'F' || (isset($product) && $product->gender == 'F')) ? 'selected' : '' }}>Female</option>
                <option value="M" {{ (old('gender') == 'M' || (isset($product) && $product->gender == 'M')) ? 'selected' : '' }}>Male</option>
                <option value="G" {{ (old('gender') == 'G' || (isset($product) && $product->gender == 'G')) ? 'selected' : '' }}>General</option>
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
