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
                    <h2>Profile</h2>
                    <div class="mb-4">
                        @if(auth()->check())
                            <div class="">
                                <h5 class="card-title">Personal Information</h5>
                                <p class="card-text"><strong>Name:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ Auth::user()->address }}</p>
                            </div>
                        @else
                            <p>User not logged in.</p>
                        @endif
                    </div>

                    <!-- Orders Table -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order History</h5>
                            @if($orders->isEmpty())
                                <p class="card-text">No orders found.</p>
                            @else
                                <table class="table">
                                    <thead>
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
                                                <td>{{ $order->subtotal }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ $order->billing_address }}</td>
                                                <td>{{ $order->shipping_address }}</td>
                                                <td>{{ $order->pst }}</td>
                                                <td>{{ $order->gst }}</td>
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
    </div>
</section>

@endsection
