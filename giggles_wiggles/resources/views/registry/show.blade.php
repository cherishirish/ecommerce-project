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
                
                            <h2 class="text-center">{{ $registry->registryName }}</h2> 
                            <p class="text-center"> Event Date :  {{ $registry->eventDate }} </p>
                           
                            @foreach ($products as $product)
                            <div>
                                {{ $product->product_name }} - {{ $product->price }}
                                <button onclick="deleteProduct({{ $product->id }})">Delete</button>
                            </div>
                        @endforeach


                
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
