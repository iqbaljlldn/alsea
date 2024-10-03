<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Shipment;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ShipmentRequest;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipments = Shipment::with(['user', 'company'])->get();

        return response()->json([$shipments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shipments = Shipment::with(['user', 'company'])->get();

        return response()->json([$shipments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShipmentRequest $request)
    {
        $data = $request->all();
        $shipment = Shipment::create($data);

        return response()->json(['shipment' => $shipment]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Shipment::with(['user', 'company'])->findOrFail($id);

        return response()->json([$item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShipmentRequest $request, $id)
    {
        $item = Shipment::with(['user', 'company'])->findOrFail($id);

        return response()->json([$item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShipmentRequest $request, $id)
    {
        $data = $request->all();
        $item = Shipment::findOrFail($id);
        $item->update($data);

        return response()->json([
            'status' => true,
            'item' => $item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
