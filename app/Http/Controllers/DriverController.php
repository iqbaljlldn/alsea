<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();

        return response()->json([$drivers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Driver::all();

        return response()->json([$drivers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverRequest $request)
    {
        $data = $request->all();
        $item = Driver::create($data);

        return response()->json([
            'data' => [
                'status' => true,
                'item' => $item
            ]
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        return response()->json([$driver]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        return response()->json([$driver]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverRequest $request, $id)
    {
        $data = $request->all();
        $item = Driver::findOrFail($id);
        $item->update($data);

        return response()->json([
            'data' => [
                'status' => true,
                'item' => $item
            ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
