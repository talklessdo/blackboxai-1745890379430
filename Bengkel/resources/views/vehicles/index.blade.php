@extends('layouts.app')

@section('title', 'Vehicles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Vehicles</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
</div>

@if($vehicles->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Customer</th>
            <th>License Plate</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicles as $vehicle)
        <tr>
            <td><a href="{{ route('customers.show', $vehicle->customer) }}">{{ $vehicle->customer->name }}</a></td>
            <td><a href="{{ route('vehicles.show', $vehicle) }}">{{ $vehicle->license_plate }}</a></td>
            <td>{{ $vehicle->brand }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->year }}</td>
            <td>
                <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $vehicles->links() }}

@else
<p>No vehicles found.</p>
@endif
@endsection
