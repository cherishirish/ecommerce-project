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




        <div class="registry-card shadow p-4 mb-5 bg-white rounded">
            <h2 class="text-center">{{ $registry->registryName }}</h2>
            <p class="text-center text-muted font-italic">Check out our registry!</p>


            <div id="registry-card-info">

                <div id="registry-show-info"  class="text-center mt-4 me-5">
                    <p>{{ $registry->registryName }}</p>
                    <p class="py-2">Registry #: <strong> {{ date('Y') }}-{{ $registry->id }} </strong></p>
                    <p>Location: <strong>{{ $registry->user->address->city }} , {{ $registry->user->address->province }} </strong></p>
                    <p>Event Date: <strong>{{ (new DateTime($registry->eventDate))->format('M d, Y') }} </strong></p>
                    <p class="font-italic" style="font-size:12px;">Copy the public link to share the registry: </p> 
                    <div style="display:flex; flex-direction:row; width: 80%;">
                        <input type="text" value="team3.uwpace.ca/public/{{ $registry->id }}" id="myInput">
                            <button class="btn btn-light" onclick="myFunction()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 
                            0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 
                            1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 
                            2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                            </svg>
                    </div>
                </div>

                
                <div class="text-center barcode ">
                    <img src="/images/giggleswiggles.png" width="200" height="200" alt="Barcode Image">
                </div>
            </div>
        </div>

         <!-- Mobile view
    <div class="registry-card shadow p-4 mb-5 bg-white rounded d-sm-block d-md-none">
        <h2 class="text-center">{{ $registry->registryName }}</h2>
        <p class="text-center text-muted font-italic">Share your wish list of the must-have items to your loved ones</p>


        <div id="registry-card-info" class="row">

            <div class="col-12 barcode text-center">
                <img src="/images/giggleswiggles.png" width="100" height="100" alt="Barcode Image" class="img-fluid">
            </div>
            <div id="registry-show-info"  class="col-12 mt-4">
                <p>{{ $registry->registryName }}</p>
                <p class="py-2">Registry #: <strong> {{ date('Y') }}-{{ $registry->id }}  </strong></p>
                <p class="py-2">Location: <strong>{{ $registry->user->address->city }} , {{ $registry->user->address->province }} </strong></p>
                <p class="py-2">Event Date: <strong>{{ (new DateTime($registry->eventDate))->format('M d, Y') }} </strong></p>
                <p class="font-italic py-2" style="font-size:12px;">Copy the public link to share the registry: </p> 
                <div style="display:flex; flex-direction:row; width: 80%;">
                    <input type="text" value="team3.uwpace.ca/public/{{ $registry->id }}" id="myInput">
                        <button class="btn btn-light" onclick="myFunction()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 
                        0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 
                        1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 
                        2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                        </svg>
                </div>
        </div>
    </div> -->



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


    function myFunction() {
    var copyText = document.getElementById("myInput");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    // alert("Copied the text: " + copyText.value);
}
</script>
@endsection
