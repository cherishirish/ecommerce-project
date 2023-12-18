@extends('layouts.frontend')

@section('content')
<div class="container my-4">
    <h2 class="mb-3 pt-5">Shopping Cart</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cart as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        <td><a href="{{ route('cart.remove', $item['product_id']) }}" class="btn btn-danger">Remove</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Your cart is empty.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="3" class="text-right">Total:</th>
                    <th>${{ number_format($totalPrice, 2) }}</th>
                </tr>
            </tfoot>
        </table>


        <div class="cart-btn mb-5">

        @if(!empty($cart))
            <div class="cart-checkout btn btn-primary"> 
                <a href="{{ route('checkout.index') }}" class="text-white">Checkout</a>
            </div>  
            <!-- <div class="cart-checkout btn btn-primary"> <a href="{{ route('checkout.index') }}" class="text-white">Checkout</a></div> -->
            <div class="cart-clear btn btn-danger"><a href="{{ route('cart.clear') }}" class="text-white">Clear</a></div>
        </div>
        @endif


    </div>
</div>

@endsection
