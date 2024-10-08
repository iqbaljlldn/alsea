<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Fcl_container;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Fcl_containerRequest;

class FclContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fcl = Fcl_container::with(['shipment','driver'])->get();

        return response()->json([$fcl]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fcl = Fcl_container::with(['shipment', 'driver'])->get();

        return response()->json([$fcl]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Fcl_containerRequest $request)
    {
        $data = $request->validated();
        $data['photo_container'] = $request->file('photo_container')->store('assets/fcl-container', 'public');
        $data['photo_seal'] = $request->file('photo_seal')->store('assets/fcl-container', 'public');
        $container = Fcl_container::create($data);
        $history = History::create([
            'shipment_id' => $data['shipment_id'],
            'user_id' => '1',
            'containerable_id' => $container->id,
            'containerable_type' => Fcl_container::class,
            'action_type' => 'created'
        ]);

        return response()->json(['container' => $container, 'history' => $history]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fcl = Fcl_container::with(['shipment', 'driver'])->findOrFail($id);

        return response()->json([$fcl]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fcl_containerRequest $request, $id)
    {
        $fcl = Fcl_container::with(['shipment', 'driver'])->findOrFail($id);

        return response()->json([$fcl]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Fcl_containerRequest $request, $id)
    {
        $data = $request->all();
        $item = Fcl_container::findOrFail($id);

        if ($request->hasFile('photo_container')) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path);
            }
            $data['photo_container'] = $request->file('photo_container')->store('assets/fcl-container', 'public');
        }
        if ($request->hasFile('photo_seal')) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path);
            }
            $data['photo_seal'] = $request->file('photo_seal')->store('assets/fcl-container', 'public');
        }

        $item->update($data);

        $history = History::create([
            'shipment_id' => $data['shipment_id'],
            'user_id' => '1',
            'containerable_id' => $item->id,
            'containerable_type' => Fcl_container::class,
            'action_type' => 'updated'
        ]);

        return response()->json(['container' => $item, 'history' => $history]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fcl_container = Fcl_container::findOrFail($id);

        $fcl_container->delete();

        return response()->json(["Status" => "Deleted"]);
    }
}
