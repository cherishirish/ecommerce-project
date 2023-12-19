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
                    <h2 class="mb-4">{{$title}}</h2>
                    
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
                            </tbody>
                        </table>
                    </div>
                    

                    <hr class="custom-hr">

                    <!-- Edit Shipping Address Button -->
                    <div class="mb-4">
                        <a href="{{ route('page.shippingaddress_edit') }}" class="btn btn-primary">Edit Your Shipping Address</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteShippingAddressModal">Delete</button>
                    </div>

                    <!-- Shipping Address Table -->
                    <div class="mb-4">
                        <h5 class="mb-3">Shipping Address Information</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Shipping Address</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Postal Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ optional(Auth::user()->shippingAddress)->address ?? '-' }}</td>
                                    <td>{{ optional(Auth::user()->shippingAddress)->city ?? '-' }}</td>
                                    <td>{{ optional(Auth::user()->shippingAddress)->province ?? '-' }}</td>
                                    <td>{{ optional(Auth::user()->shippingAddress)->postal_code ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>

                    <!-- Delete Shipping Address Modal -->
                    <div class="modal fade" id="deleteShippingAddressModal" tabindex="-1" aria-labelledby="deleteShippingAddressModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteShippingAddressModalLabel">Delete Shipping Address</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete your shipping address?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="{{ route('page.delete_shipping_address') }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="custom-hr">

                    <!-- Edit Billing Address Button -->
                    <div class="mb-4">
                        <a href="{{ route('page.billingaddress_edit') }}" class="btn btn-primary">Edit Your Billing Address</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBillingAddressModal">Delete</button>
                    </div>

                    <!-- Billing Address Table -->
                    <div class="mb-4">
                        <h5 class="mb-3">Billing Address Information</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Billing Address</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Postal Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ optional(Auth::user()->billingAddress)->address ?? '-' }}</td>
                                    <td>{{ optional(Auth::user()->billingAddress)->city ?? '-' }}</td>
                                    <td>{{ optional(Auth::user()->billingAddress)->province ?? '-' }}</td>
                                    <td>{{ optional(Auth::user()->billingAddress)->postal_code ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Delete Billing Address Modal -->
                    <div class="modal fade" id="deleteBillingAddressModal" tabindex="-1" aria-labelledby="deleteBillingAddressModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteBillingAddressModalLabel">Delete Billing Address</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete your billing address?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="{{ route('page.delete_billing_address') }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="custom-hr">

                    <!-- Number of Orders -->
                    <div class="mb-4">
                        <h5 class="mb-3">Order History</h5>
                        <p class="mb-0">Number of Orders: {{ $orders->count() }}</p>
                    </div>

                    <hr class="custom-hr">

                    <!-- Orders Table -->
                    <div>
                        <h5 class="mb-3">Order Details</h5>
                        @if($orders->isEmpty())
                            <p class="mb-0">No orders found.</p>
                        @else
                            <div class="table-responsive">
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
                                                <td>{{ $order->created_at->format('M d, Y H:i A') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
