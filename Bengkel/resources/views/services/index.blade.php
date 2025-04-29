@extends('layouts.app')

@section('title', 'Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary">Add Service</a>
</div>

@if($services->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Vehicle</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Complaints</th>
            <th>Repair Actions</th>
            <th>Cost</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td><a href="{{ route('vehicles.show', $service->vehicle) }}">{{ $service->vehicle->license_plate }}</a></td>
            <td><a href="{{ route('customers.show', $service->vehicle->customer) }}">{{ $service->vehicle->customer->name }}</a></td>
            <td>{{ $service->date->format('Y-m-d') }}</td>
            <td>{{ $service->complaints }}</td>
            <td>{{ $service->repair_actions }}</td>
            <td>Rp {{ number_format($service->cost, 2, ',', '.') }}</td>
            <td>
                <a href="{{ route('services.show', $service) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $services->links() }}

@else
<p>No services found.</p>
@endif
@endsection
