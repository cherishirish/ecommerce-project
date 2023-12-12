@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="px-4 w-100">
        <h1>{{ $title }}</h1>

        <!-- Content Row -->
        <div class="row">
            <form method="post" action="{{route('admin.tax-rates.update')}}" class="form" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="id" id="id" value="{{ $tax_item->id }}">

                <div class="form-group row my-4">
                    <label for="province" class="col-sm-4 col-form-label">Province</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-plaintext" name="province" id="province" readonly
                        value="{{ $tax_item->province }}">
                    </div>              
                </div>

                <div class="form-group row my-4">
                    <label for="pst" class="col-sm-4 col-form-label">PST</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="pst" id="pst"
                        value="{{ old('pst', $tax_item->pst) }}">
                        @error('pst')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>                         
                </div>

                <div class="form-group row my-4">
                    <label for="gst" class="col-sm-4 col-form-label">GST</label>
                    <div class="col-sm-8">
                        <input type="gst" class="form-control" name="gst" id="gst"
                        value="{{ old('gst', $tax_item->gst) }}">
                        @error('gst')
                            <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
                                    
                </div>

                <div class="form-group row my-4">
                    <label for="hst" class="col-sm-4 col-form-label">hst</label>
                    <div class="col-sm-8">
                        <input type="hst" class="form-control" name="hst" id="hst"
                        value="{{ old('hst', $tax_item->hst) }}">
                        @error('hst')
                            <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </div>
                                        
                </div>

                <div class="form-group row my-4">
                    <label for="value_added" class="col-sm-4 col-form-label">Value Added</label>
                    <div class="col-sm-8">
                        <input type="value_added" class="form-control" name="value_added" id="value_added"
                        value="{{ old('value_added', $tax_item->value_added) }}">
                        @error('value_added')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                                    
                </div>
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
        </div>

    </div>
@endsection