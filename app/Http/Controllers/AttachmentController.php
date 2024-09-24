<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\AttachmentRequest;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attachments = Attachment::all();

        return response()->json([$attachments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attachment = Attachment::all();

        return response()->json([$attachment]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttachmentRequest $request)
    {
        $data = $request->all();
        $attachment = Attachment::create($data);

        return response()->json([$attachment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $attachment = Attachment::findOrFail($id);

        return response()->json([$attachment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = Attachment::findOrFail($id);

        return response()->json([$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Attachment::findOrFail($id);
        $item->update($data);

        return response()->json([$item]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);

        $attachment->delete();

        return response()->json(["Status" => "Deleted"]);
    }
}
