<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return response()->json([$companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = Company::all();

        return view('create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        $create = Company::create($data);

        return response()->json(['data' => [
            'status' => true,
            'message' => 'Sukses',
            'data' => $create
        ]]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $data = Company::where('id', $id)->firstOrFail();

        return response()->json([$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $companies = Company::findOrFail($id);

        return response()->json(['data' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, $id)
    {
        $data = $request->all();
        $item = Company::findOrFail($id);

        $item->update($data);

        return response()->json([$data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Company::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Success']);
    }
}
