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
     * Display the specified resource.
     */
    public function show(History $history, $id)
    {
        $histories = History::with(['shipment', 'user'])->findOrFail($id);

        return response()->json([$histories]);
    }
}
