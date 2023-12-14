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
                <!-- Profile Information -->
                <div>
                    <h2 class="mb-4">Profile</h2>
                    
                    <!-- Edit Profile Button -->
                    <div class="mb-4">
                        <a href="{{ route('page.profile_edit') }}" class="btn btn-primary">Edit Your Profile</a>
                    </div>

                    <!-- User Details Table -->
                    <div class="mb-4">
                        <h5 class="mb-3">Personal Information</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ optional(Auth::user()->address)->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Number of Orders -->
                    <div class="mb-4">
                        <h5 class="mb-3">Order History</h5>
                        <p class="mb-0">Number of Orders: {{ $orders->count() }}</p>
                    </div>

                    <!-- Orders Table -->
                    <div>
                        <h5 class="mb-3">Order Details</h5>
                        @if($orders->isEmpty())
                            <p class="mb-0">No orders found.</p>
                        @else
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Subtotal</th>
                                        <th>Total</th>
                                        <th>Billing Address</th>
                                        <th>Shipping Address</th>
                                        <th>PST</th>
                                        <th>GST</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>${{ number_format($order->subtotal, 2) }}</td>
                                            <td>${{ number_format($order->total, 2) }}</td>
                                            <td>{{ $order->billing_address }}</td>
                                            <td>{{ $order->shipping_address }}</td>
                                            <td>${{ number_format($order->pst, 2) }}</td>
                                            <td>${{ number_format($order->gst, 2) }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->created_at->format('M d, Y H:i A') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
