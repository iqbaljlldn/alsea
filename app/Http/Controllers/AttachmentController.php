<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttachmentRequest;
use App\Models\Shipment;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attachments = Attachment::with(['shipment'])->get();

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
        $data['file_path'] = $request->file('file_path')->store('assets/attachment', 'public');
        $attachment = Attachment::create($data);

        return response()->json(['item' => $attachment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $item = Attachment::with('shipment')->findOrFail($id);

        return response()->json([$item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $item = Attachment::with(['shipment'])->findOrFail($id);

        return response()->json([$item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttachmentRequest $request, $id)
    {
        $data = $request->all();
        $attachment = Attachment::findOrFail($id);
        if ($request->hasFile('file_path')) {
            if ($attachment->file_path) {
                Storage::disk('public')->delete($attachment->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('assets/attachment', 'public');
        }

        $attachment->update($data);

        return response()->json(['data' => $attachment]);
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
