@extends('layouts.admin')

@section('content')
<div class="px-4 pt-4 w-100">
    <!-- Pagination -->
    <div>
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Ordered Items</th>
                <th>Total</th>
                <th>Shipping Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                <td>
                    @foreach($order->lineItems as $item)
                    <ul>
                        <li>{{ $item->name }} (Unit Price: {{ '$' . $item->unit_price . ', Quantity: ' . $item->quantity }})</li>
                    </ul>
                    @endforeach
                </td>
                <td>{{ '$' . $order->total }}</td>
                <td>{{ $order->status == 0 ? 'Not Shipped' : 'Shipped' }}</td>
                <td>
                    <a href="{{route('admin.orders.edit', ['id'=>$order->id])}}" class="btn btn-info">Edit</a>
                    <td>
                    <form method="post" action="{{ route('admin.orders.delete', ['id'=>$order->id]) }}" id="delete">
                        @csrf    
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Do you really want to delete this order?')" id="delete_button">Delete</button>
                    </form>
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
