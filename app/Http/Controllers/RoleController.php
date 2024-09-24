<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return response()->json([
            'data' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return response()->json([
            'data' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->all();

        $item = Role::create($data);

        return response()->json([
            'data' => [
                'status' => 'true',
                'item' => $item
            ]
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $item = Role::findOrFail($id);

        return response()->json([$item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $item = Role::findOrFail($id);

        return response()->json([$item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, $id)
    {
        $data = $request->all();
        $item = Role::findOrFail($id);
        $item->update($data);

        return response()->json([$item]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json([
            'status' => true,
            'message' => 'Deleted'
        ]);
    }
}
