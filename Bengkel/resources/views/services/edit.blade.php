@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
<h1>Edit Service</h1>

<form action="{{ route('services.update', $service) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="vehicle_id" class="form-label">Vehicle</label>
        <select class="form-select @error('vehicle_id') is-invalid @enderror" id="vehicle_id" name="vehicle_id" required>
            <option value="">Select Vehicle</option>
            @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $service->vehicle_id) == $vehicle->id ? 'selected' : '' }}>
                    {{ $vehicle->license_plate }} - {{ $vehicle->customer->name }}
                </option>
            @endforeach
        </select>
        @error('vehicle_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $service->date->format('Y-m-d')) }}" required>
        @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="complaints" class="form-label">Complaints</label>
        <textarea class="form-control @error('complaints') is-invalid @enderror" id="complaints" name="complaints" rows="3" required>{{ old('complaints', $service->complaints) }}</textarea>
        @error('complaints')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="repair_actions" class="form-label">Repair Actions</label>
        <textarea class="form-control @error('repair_actions') is-invalid @enderror" id="repair_actions" name="repair_actions" rows="3" required>{{ old('repair_actions', $service->repair_actions) }}</textarea>
        @error('repair_actions')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cost" class="form-label">Cost</label>
        <input type="number" step="0.01" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ old('cost', $service->cost) }}" required min="0">
        @error('cost')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update Service</button>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
