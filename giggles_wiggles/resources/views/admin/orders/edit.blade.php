@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="px-4 w-100">
        <h1>{{ $title }}</h1>

        <!-- Content Row -->
        <div class="row">
            <form method="post" action="{{route('admin.orders.update')}}" class="form" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="id" id="id" value="{{ $order->id }}">

                <div class="form-group row my-4">
                    <label for="province" class="col-sm-2 col-form-label">Ordered by</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" name="province" id="province" readonly
                        value="{{ $order->user->email }}">
                    </div>              
                </div>

                <div class="form-group row my-4">
                    <label for="province" class="col-sm-2 col-form-label">Ordered Items</label>
                    <div class="col-sm-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->lineItems as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->unit_price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>              
                </div>

                <div class="form-group row my-4">
                    <label for="subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subtotal" id="subtotal"
                        value="{{ old('subtotal', $order->subtotal) }}">
                        @error('subtotal')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>                         
                </div>

                <div class="form-group row my-4">
                    <label for="pst" class="col-sm-2 col-form-label">PST</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pst" id="pst"
                        value="{{ old('pst', $order->pst) }}">
                        @error('pst')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>                         
                </div>

                <div class="form-group row my-4">
                    <label for="gst" class="col-sm-2 col-form-label">GST</label>
                    <div class="col-sm-10">
                        <input type="gst" class="form-control" name="gst" id="gst"
                        value="{{ old('gst', $order->gst) }}">
                        @error('gst')
                            <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                                    
                </div>

                <div class="form-group row my-4">
                    <label for="hst" class="col-sm-2 col-form-label">HST</label>
                    <div class="col-sm-10">
                        <input type="hst" class="form-control" name="hst" id="hst"
                        value="{{ old('hst', $order->hst) }}">
                        @error('hst')
                            <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </div>
                                        
                </div>


                <div class="form-group row my-4">
                    <label for="billing_address" class="col-sm-2 col-form-label">billing_address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="billing_address" id="billing_address"
                        value="{{ old('billing_address', $order->billing_address) }}">
                        @error('billing_address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>                         
                </div>

                <div class="form-group row my-4">
                    <label for="shipping_address" class="col-sm-2 col-form-label">shipping_address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="shipping_address" id="shipping_address"
                        value="{{ old('shipping_address', $order->shipping_address) }}">
                        @error('shipping_address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>                         
                </div>

                <div class="form-group row my-4">
                    <label for="total" class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="total" id="total"
                        value="{{ old('total', $order->total) }}">
                        @error('total')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>                         
                </div>

                <div class="form-group row my-4">
                    <label for="status" class="col-sm-2 col-form-label">Shipping status</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="status" name='status'>
                            <option value="0" {{ ($order->status == 0) ? 'selected' : '' }}>Not Shipped</option>
                            <option value="1" {{ $order->status !== 0 ? 'selected' : '' }}>Shipped</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>                         
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
        </div>

    </div>
@endsection
