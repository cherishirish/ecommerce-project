@extends('layouts.frontend')

@section('content')

<section class="py-3">
    <div class="container px-4 px-lg-5">

        <!-- Main Content Header Image-->
        <div class="main-header mb-3">
            <img src="/images/breadcrumb.jpg" alt="">
        </div>

        <nav aria-label="breadcrumb">
            <ol id="breadcrumb" class="breadcrumb">
                <li class="breadcrumb-item"><a class="pr-1 text-dark" href="{{ route('home') }}">Home</a> | {{ $title }}</li>
            </ol>
        </nav>

        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-12 pt-5 pt-md-0">
                <!--  -->
                <div class="card">
                    <div class="form-container" id="registry-form">
                    <h4 class="card-title mt-3 mb-3 text-center">Update Registry</h4>
                       

                    <form action="{{ route('registry.update', $registry->id) }}" method="post">
                        @csrf
                        @method('PUT') 
                        <!-- Desktop and tablet view -->
                        <div class="row info d-none d-md-block">
                            <div class="col-md-6 d-flex mb-5 mt-5 pt-5 pb-4 rounded" style="width:100%; justify-content: space-around; background-color: rgba(227, 222, 245, 0.553);">

                                <div class="form-group d-flex flex-column flex-md-row px-3 gap-3">
                                    <label for="registryName">Registry Name:</label>
                                    <input type="text" id="registryName" name="registryName" value="{{ $registry->registryName }}" required>
                                </div>

                                <div class="form-group d-flex flex-column flex-md-row px-3 gap-3">
                                    <label for="eventDate">Event's Date:</label>
                                    <input type="date" id="eventDate" name="eventDate" value="{{ $registry->eventDate }}" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update Info">
                                </div>
                            </div>
                        </div>

                        <!-- Mobile view -->
                        <div class="row info d-sm-block d-md-none">
                            <div class="my-3 rounded" style="width:100%; justify-content: space-around; background-color: rgba(227, 222, 245, 0.553);">
                                <div class="form-group col-12 px-3 pt-3">
                                    <label for="registryName">Registry Name:</label>
                                    <input type="text" id="registryName" name="registryName" value="{{ $registry->registryName }}" required>
                                    
                                </div>

                                <div class="form-group col-12 px-3 pt-2">
                                    <label for="eventDate">Event's Date:</label>
                                    <input type="date" id="eventDate" name="eventDate" value="{{ $registry->eventDate }}" required>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update Info">
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="container mt-4">
                            <div class="row">
                                @foreach ($products as $product)
                                    
                                        <div class="col-md-4 mb-4">

                                            <div class="card rounded">
                                                <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->product_name }}" class="card-img-top">
                                                </a>
                                            
                                                <div class="card-footer bg-light ">
                                                    <div class="float-start d-flex">
                                                        {{ $product->product_name }} -   <p style="color:red "> ${{ $product-> price }} </p>
                                                    </div>

                                                    <div class="float-end d-flex">
                                                        <button class="btn btn-close" onclick="deleteProduct({{ $product->id }})"></button>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                        </div>
                                
                                        @if($loop->iteration % 3 == 0)
                                            </div><div class="row">
                                        @endif 
                                @endforeach
                            </div>
                        </div>
   
                </div>
            </div>
        </div>
    </div>
</section>


<script>
  function deleteProduct(productId) {
        if(confirm('Are you sure you want to remove this product?')) {
            axios.post('{{ route("registry.removeProduct", $registry->id) }}', {
                productId: productId,
                _method: 'DELETE',
                _token: '{{ csrf_token() }}'
            })
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.error('Error removing product:', error);
            });
        }
    }


    
</script>
@endsection
