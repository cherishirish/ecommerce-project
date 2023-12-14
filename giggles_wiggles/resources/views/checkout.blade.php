@extends('layouts.frontend')

@section('content')
<div class="container">
    <h2>Checkout</h2>
    
    <div class="row">
        <!-- User Details -->
        <div class="col-md-6">
            <h3>User Details</h3>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Address:</strong> {{ $address->address }}</p>
            <p><strong>Postal Code:</strong> {{ $address->postal_code }}</p>
            <p><strong>City:</strong> {{ $address->city }}</p>
            <p><strong>Province:</strong> {{ $address->province }}</p>
        </div>

        <form>
            <div class="form-group" id="payment_form">
                <label for="name_on_card">Name on Card</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name on Card">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
