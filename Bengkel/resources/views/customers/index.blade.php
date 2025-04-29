@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Customers</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
</div>

@if($customers->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->name }}</a></td>
            <td>{{ $customer->phone_number }}</td>
            <td>{{ $customer->address }}</td>
            <td>
                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $customers->links() }}

@else
<p>No customers found.</p>
@endif
@endsection
