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

        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12 mb-4">
                <!-- User Information Table -->
                <div>
                    <h5>User Details</h5>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <!-- Add more user details as needed -->
                            <tr>
                                <th>Address</th>
                                <td>{{ optional(Auth::user()->shippingAddress)->address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ optional(Auth::user()->shippingAddress)->city ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Province</th>
                                <td>{{ optional(Auth::user()->shippingAddress)->province ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Postal Code</th>
                                <td>{{ optional(Auth::user()->shippingAddress)->postal_code ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-12 mb-4">
                <!-- Order Information Table -->
                <div>
                    <h5>Order Information</h5>
                    @if ($orders->isNotEmpty())
                        @php
                            $order = $orders->first();
                            $lineItems = $order->lineItems; // Retrieve line items for the specific order
                            $totalProductPrice = 0;
                        @endphp
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('M d, Y H:i A') }}</td>
                                    <td>${{ number_format($totalProductPrice + $order->gst + $order->pst, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Product Details Table -->
                        <div class="mt-4">
                            <h5>Product Details</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lineItems as $lineItem)
                                        <tr>
                                            <td>{{ $lineItem->name }}</td>
                                            <td>${{ number_format($lineItem->unit_price, 2) }}</td>
                                            <td>{{ $lineItem->quantity }}</td>
                                            <td>${{ number_format($lineItem->unit_price * $lineItem->quantity, 2) }}</td>
                                            @php
                                                $totalProductPrice += $lineItem->unit_price * $lineItem->quantity;
                                            @endphp
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Product Summary Table -->
                        <div class="mt-4">
                            <h5>Product Summary</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Total Product Price</th>
                                        <td>${{ number_format($totalProductPrice, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>GST</th>
                                        <td>${{ number_format($order->gst, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>PST</th>
                                        <td>${{ number_format($order->pst, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Final Total</th>
                                        <td>${{ number_format($totalProductPrice + $order->gst + $order->pst, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No orders found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
