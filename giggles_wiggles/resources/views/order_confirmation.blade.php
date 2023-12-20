
@extends('layouts.frontend')

@section('content')
<div class="container">

    <section class="py-3">

        <div class="container px-4 px-lg-5 text-center">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-12 mt-5">
                    <h2>Your Order Has Been Placed!</h2>
                    <p>We have sent a receipt to your email</p>
                </div>
                <div id="order_confirmation_details">
                    <h2>Order Details</h2>
                    <p>{{$order->total}}</p>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
