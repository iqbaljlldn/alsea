<?php

namespace App\Http\Controllers;

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
        $item = Lcl_container::create($data);

        return response()->json([$item]);
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

        return response()->json([$item]);
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
