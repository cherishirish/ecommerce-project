@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="container my-3">
        
        <!-- Content Row -->
       
            <form method="post" action="{{route('admin.orders.update')}}" class="form" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="id" id="id" value="{{ $order->id }}">

                <div class="form-group my-3">
                    <label for="province" class="col-form-label text-end">Ordered by</label>
                    
                    <input type="text" class="form-control-plaintext" name="province" id="province" readonly
                        value="{{ $order->user->email }}">
                                  
                </div>

                <div class="form-group my-3">
                    <label for="province" class="col-form-label text-end">Ordered Items</label>
                    
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

                <div class="form-group my-3">
                    <label for="subtotal" class="col-form-label text-end">Subtotal</label>
                   
                        <input type="text" class="form-control" name="subtotal" id="subtotal"
                        value="{{ old('subtotal', $order->subtotal) }}">
                        @error('subtotal')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                                           
                </div>

                <div class="form-group my-3">
                    <label for="pst" class="col-form-label text-end">PST</label>
                    
                        <input type="text" class="form-control" name="pst" id="pst"
                        value="{{ old('pst', $order->pst) }}">
                        @error('pst')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                                            
                </div>

                <div class="form-group my-3">
                    <label for="gst" class="col-form-label text-end">GST</label>
                    
                        <input type="gst" class="form-control" name="gst" id="gst"
                        value="{{ old('gst', $order->gst) }}">
                        @error('gst')
                            <span class="text-danger">{{$message}}</span>
                        @enderror   
                                                       
                </div>

                <div class="form-group my-3">
                    <label for="hst" class="col-form-label text-end">HST</label>
                    
                        <input type="hst" class="form-control" name="hst" id="hst"
                        value="{{ old('hst', $order->hst) }}">
                        @error('hst')
                            <span class="text-danger">{{$message}}</span>
                        @enderror  
                    
                                        
                </div>


                <div class="form-group my-3">
                    <label for="billing_address" class="col-form-label text-end">billing_address</label>
                    
                        <input type="text" class="form-control" name="billing_address" id="billing_address"
                        value="{{ old('billing_address', $order->billing_address) }}">
                        @error('billing_address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                                            
                </div>

                <div class="form-group my-3">
                    <label for="shipping_address" class="col-form-label text-end">shipping_address</label>
                    
                        <input type="text" class="form-control" name="shipping_address" id="shipping_address"
                        value="{{ old('shipping_address', $order->shipping_address) }}">
                        @error('shipping_address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                                           
                </div>

                <div class="form-group my-3">
                    <label for="total" class="col-form-label text-end">Total</label>
                    
                        <input type="text" class="form-control" name="total" id="total"
                        value="{{ old('total', $order->total) }}">
                        @error('total')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                                            
                </div>

                <div class="form-group my-3">
                    <label for="status" class="col-form-label text-end">Shipping Status</label>
                    
                        <select class="form-select" id="status" name='status'>
                            <option {{ $order->status == 0 ? 'selected' : '' }} value="0">Not Shipped</option>
                            <option {{ $order->status != 0 ?  'selected' : '' }} value="1">Shipped</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                                           
                </div>
            
                <div class="form-group my-3">
                    <label for="value_added" class="col-form-label text-end"></label>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                    
                </div>
            </form>
            
       

    </div>
@endsection