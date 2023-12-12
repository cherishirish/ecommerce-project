@extends('layouts.app')

@section('content')
    <h1>Create/Edit Category</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <!-- Form fields -->

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
