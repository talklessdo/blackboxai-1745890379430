@extends('layouts.app')

@section('title', 'Vehicle Details')

@section('content')
<h1>Vehicle Details</h1>

<div class="mb-3">
    <strong>Customer:</strong> <a href="{{ route('customers.show', $vehicle->customer) }}">{{ $vehicle->customer->name }}</a>
</div>
<div class="mb-3">
    <strong>License Plate:</strong> {{ $vehicle->license_plate }}
</div>
<div class="mb-3">
    <strong>Brand:</strong> {{ $vehicle->brand }}
</div>
<div class="mb-3">
    <strong>Model:</strong> {{ $vehicle->model }}
</div>
<div class="mb-3">
    <strong>Year:</strong> {{ $vehicle->year }}
</div>

<h2>Service History</h2>

@if($vehicle->services->count())
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Complaints</th>
            <th>Repair Actions</th>
            <th>Cost</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicle->services as $service)
        <tr>
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
@else
<p>No service history found.</p>
@endif

<a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back to Vehicles</a>
<a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning">Edit Vehicle</a>
<form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete Vehicle</button>
</form>
@endsection
