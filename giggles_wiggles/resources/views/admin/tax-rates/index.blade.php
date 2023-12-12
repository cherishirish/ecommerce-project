@extends('layouts.admin')

@section('content')
<div class="px-4 w-100">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Province</th>
                <th>PST</th>
                <th>GST</th>
                <th>HST</th>
                <th>Value Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tax_list as $tax)
            <tr>
                <td>{{ $tax->id }}</td>
                <td>{{ $tax->province }}</td>
                <td>{{ $tax->pst }}</td>
                <td>{{ $tax->gst }}</td>
                <td>{{ $tax->hst }}</td>
                <td>{{ $tax->value_added }}</td>
                <td>
                <a href="{{route('admin.tax-rates.edit', ['id'=>$tax->id])}}" class="btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
