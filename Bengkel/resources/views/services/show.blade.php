@extends('layouts.app')

@section('title', 'Service Details')

@section('content')
<h1>Service Details</h1>

<div class="mb-3">
    <strong>Vehicle:</strong> <a href="{{ route('vehicles.show', $service->vehicle) }}">{{ $service->vehicle->license_plate }}</a>
</div>
<div class="mb-3">
    <strong>Customer:</strong> <a href="{{ route('customers.show', $service->vehicle->customer) }}">{{ $service->vehicle->customer->name }}</a>
</div>
<div class="mb-3">
    <strong>Date:</strong> {{ $service->date->format('Y-m-d') }}
</div>
<div class="mb-3">
    <strong>Complaints:</strong> {{ $service->complaints }}
</div>
<div class="mb-3">
    <strong>Repair Actions:</strong> {{ $service->repair_actions }}
</div>
<div class="mb-3">
    <strong>Cost:</strong> Rp {{ number_format($service->cost, 2, ',', '.') }}
</div>

<a href="{{ route('services.index') }}" class="btn btn-secondary">Back to Services</a>
<a href="{{ route('services.edit', $service) }}" class="btn btn-warning">Edit Service</a>
<form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete Service</button>
</form>
@endsection
