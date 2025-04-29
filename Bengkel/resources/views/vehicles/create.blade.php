@extends('layouts.app')

@section('title', 'Add Vehicle')

@section('content')
<h1>Add Vehicle</h1>

<form action="{{ route('vehicles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="customer_id" class="form-label">Customer</label>
        <select class="form-select @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
            <option value="">Select Customer</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
            @endforeach
        </select>
        @error('customer_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="license_plate" class="form-label">License Plate</label>
        <input type="text" class="form-control @error('license_plate') is-invalid @enderror" id="license_plate" name="license_plate" value="{{ old('license_plate') }}" required>
        @error('license_plate')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}" required>
        @error('brand')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="model" class="form-label">Model</label>
        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}" required>
        @error('model')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" required min="1900" max="{{ date('Y') }}">
        @error('year')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Add Vehicle</button>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
