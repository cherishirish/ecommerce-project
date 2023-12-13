@extends('layouts.admin')

@section('content')
<div class="px-4 w-100">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Ordered Items</th>
                <th>Subtotal</th>
                <th>PST</th>
                <th>GST</th>
                <th>HST</th>
                <th>Total</th>
                <th>billing_address</th>
                <th>shipping_address</th>
                <th>Shipping Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->email }}</td>
                <td>{{ $order->line_items }}</td>
                <td>{{ $order->subtotal }}</td>
                <td>{{ $order->pst }}</td>
                <td>{{ $order->gst }}</td>
                <td>{{ $order->hst }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->billing_address }}</td>
                <td>{{ $order->shipping_address }}</td>
                <td>{{ $order->shipping_status }}</td>
                <td>
                <a href="{{route('admin.orders.edit', ['id'=>$order->id])}}" class="btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
