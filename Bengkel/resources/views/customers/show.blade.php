@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<h1>Customer Details</h1>

<div class="mb-3">
    <strong>Name:</strong> {{ $customer->name }}
</div>
<div class="mb-3">
    <strong>Phone Number:</strong> {{ $customer->phone_number }}
</div>
<div class="mb-3">
    <strong>Address:</strong> {{ $customer->address }}
</div>

<a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customers</a>
<a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Edit Customer</a>
<form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete Customer</button>
</form>
@endsection
