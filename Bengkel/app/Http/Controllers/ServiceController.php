<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('vehicle.customer')->paginate(10);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::with('customer')->get();
        return view('services.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'date' => 'required|date',
            'complaints' => 'required|string',
            'repair_actions' => 'required|string',
            'cost' => 'required|numeric|min:0',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::with('vehicle.customer')->findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        $vehicles = Vehicle::with('customer')->get();
        return view('services.edit', compact('service', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'date' => 'required|date',
            'complaints' => 'required|string',
            'repair_actions' => 'required|string',
            'cost' => 'required|numeric|min:0',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
