
@extends('layouts.frontend')

@section('content')
<div class="container">

    <section class="py-3">

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-12 mt-5" id="order_confirmation">
                    <h2>Your Order Has Been Placed!</h2>
                    <p>We have sent a receipt to your email</p>
                </div>
                <div id="order_confirmation_details">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p><strong>Order ID: &nbsp</strong>{{$order->id}}</p></li>
                    <li class="list-group-item">
                        <p><strong>Total: &nbsp</strong>${{$order->subtotal}}</p>
                        <p><strong>GST: &nbsp</strong>${{$order->gst}}</p>
                        <p><strong>PST: &nbsp</strong>${{$order->pst}}</p>
                        <p><strong>HST: &nbsp</strong>${{$order->hst}}</p>
                        <p><strong>Total: &nbsp</strong>${{$order->total}}</p>
                    </li>
                </ul>
                    

                </div>
            </div>
        </div>
    </section>

</div>
@endsection
