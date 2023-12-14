@extends('layouts.frontend')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    <form id="payment_form" autocomplete="off" action="{{ route('checkout.order') }}">
    
    <div class="row">
        <!-- User Details -->
        <div class="col-md-6">
            <h3>User Details</h3>
            <p><strong>Name: </strong> {{ Auth::user()->name }}</p>
            <p><strong>Email: </strong>{{ Auth::user()->email }}</p>
            <p><strong>Billing Address:</strong></p>
            <p> {{ $address->address}}</p>
            <p>{{ $address->city . ', ' . $address->province . ', Canada'}}</p>
            <p>{{ $address->postal_code }}</p>
            <p><strong>Shipping Address:</strong></p>
            <input type="checkbox" id="shipping_address_different" name="shipping_address_different">
            <label for="shipping_address_different">Same as billing address</label>

            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Street Name and Number">
            </div>
        </div>

       
            <h1 id="payment_title">Payment Details</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="name_on_card" id="name_on_card" placeholder="Name on Card" size=40>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="card_number" name="card_number" placeholder="Enter Card Number">
            </div>
            <div class="form-group">
                <input type="text" id="month" name="month" min=2 max=2 placeholder="MM" size=2>
                <input type="text" id="year" name="year" min=4 max=4 placeholder="YYYY" size=4> 
            </div>
            <div class="form-group">
                <input type="text" id="cvv" name="cvv" min=3 max=3 placeholder="CVV" size=3>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>

        
        <!-- Cart Summary -->
        <div class="col-md-6">
            <h3>Cart Summary</h3>
            @php
                $gst = 0;
                $pst = 0;
                $subtotal = 0;
                $total = 0;
                
                // Define GST and PST rates based on the user's province
                $taxRates = [
                    'GST' => 0.05, // Assuming GST is 5%
                    'PST' => [
                        'BC' => 0.07, // Assuming BC's PST is 7%
                        'ON' => 0.08, // Assuming Ontario's PST is 8%
                        // Add other provinces as needed
                    ],
                ];
                
                // Calculate subtotal
                foreach (session('cart') as $id => $item) {
                    $subtotal += $item['quantity'] * $item['price'];
                }
                
                // Calculate GST
                $gst = $subtotal * $taxRates['GST'];
                
                // Calculate PST based on user's province
                $province = Auth::user()->province;
                if (isset($taxRates['PST'][$province])) {
                    $pst = $subtotal * $taxRates['PST'][$province];
                }
                
                // Total
                $total = $subtotal + $gst + $pst;
            @endphp
            
            <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
            <p><strong>GST (5%):</strong> ${{ number_format($gst, 2) }}</p>
            <p>
                <strong>PST 
                    (@if(isset($taxRates['PST'][$province]))
                        {{ $taxRates['PST'][$province] * 100 }}%
                    @else
                        N/A
                    @endif
                ):</strong> 
                ${{ number_format($pst, 2) }}
            </p>
            <p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>
            
            <a href="{{ route('checkout.order') }}" class="btn btn-success">Place Order</a>
        </div>
    </div>
    
    <!-- Cart Details -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
