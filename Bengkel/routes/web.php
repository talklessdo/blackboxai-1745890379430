<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('customers', CustomerController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('services', ServiceController::class);

Route::get('/dashboard', function () {
    $totalCustomers = \App\Models\Customer::count();
    $totalVehicles = \App\Models\Vehicle::count();
    $todaysServices = \App\Models\Service::whereDate('date', now()->toDateString())->count();
    $monthlyRevenue = \App\Models\Service::whereMonth('date', now()->month)->sum('cost');

    return view('dashboard', compact('totalCustomers', 'totalVehicles', 'todaysServices', 'monthlyRevenue'));
})->name('dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
});
