@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Customers</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalCustomers }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Total Vehicles</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalVehicles }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Today's Services</div>
            <div class="card-body">
                <h5 class="card-title">{{ $todaysServices }}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header">Monthly Revenue</div>
            <div class="card-body">
                <h5 class="card-title">Rp {{ number_format($monthlyRevenue, 2, ',', '.') }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection
