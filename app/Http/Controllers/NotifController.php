<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Http\Requests\NotifRequest;

class NotifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifs = Notif::with('user')->get();

        return response()->json([$notifs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notifs = Notif::with('user')->get();

        return response()->json([$notifs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotifRequest $request)
    {
        $data = $request->all();
        $item = Notif::create($data);

        return response()->json([$data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(NotifRequest $request, $id)
    {
        $item = Notif::with('user')->findOrFail($id);

        return response()->json([$item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notif $notif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotifRequest $request, Notif $notif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notif $notif)
    {
        //
    }
}
