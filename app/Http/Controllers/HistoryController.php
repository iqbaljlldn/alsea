<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\HistoryRequest;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::with(['shipment','user'])->latest()->paginate(10);

        return response()->json([$histories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $history = History::with(['shipment','user'])->get();

        return response()->json([$history]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HistoryRequest $request)
    {
        $data = $request->all();
        $item = History::create($data);

        return response()->json([$item]);
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HistoryRequest $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
