<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lcl_container;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Lcl_containerRequest;

class LclContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lcl = Lcl_container::with(['shipment', 'driver'])->get();

        return response()->json([$lcl]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lcl = Lcl_container::with(['shipment', 'driver'])->get();

        return response()->json([$lcl]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Lcl_containerRequest $request)
    {
        $data = $request->all();
        $data['photo_truck'] = $request->file('photo_truck')->store('assets/lcl-container', 'public');
        $data['photo_sim'] = $request->file('photo_sim')->store('assets/lcl-container', 'public');
        $container = Lcl_container::create($data);
        $history = History::create([
            'shipment_id' => $data['shipment_id'],
            'user_id' => '1',
            'containerable_id' => $container->id,
            'containerable_type' => Lcl_container::class,
            'action_type' => 'created'
        ]);

        return response()->json(['container' => $container, 'history' => $history]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lcl = Lcl_container::with(['shipment', 'driver'])->findOrFail($id);

        return response()->json([$lcl]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lcl = Lcl_container::with(['shipment', 'driver'])->findOrFail($id);

        return response()->json([$lcl]);
    }

    /**
     * Update the specified resource in storage.
     */public function update(Lcl_containerRequest $request, $id)
    {
        $data = $request->all();

        $item = Lcl_container::findOrFail($id);

        if ($request->hasFile('photo_truck')) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path);
            }
            $data['photo_truck'] = $request->file('photo_truck')->store('assets/lcl-container', 'public');
        }
        if ($request->hasFile('photo_sim')) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path);
            }
            $data['photo_sim'] = $request->file('photo_sim')->store('assets/lcl-container', 'public');
        }
        
        $item->update($data);

        $history = History::create([
            'shipment_id' => $data['shipment_id'],
            'user_id' => '1',
            'containerable_id' => $item->id,
            'containerable_type' => Lcl_container::class,
            'action_type' => 'updated'
        ]);

        return response()->json(['container' => $item, 'history' => $history]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lcl = Lcl_container::findOrFail($id);

        $lcl->delete();

        return response()->json(["Status" => "Deleted"]);
    }
}
