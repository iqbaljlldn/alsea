<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Fcl_containerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'shipment_id' => 'required|exist:shipments,id',
            'driver_id' => 'required|exist:drivers,id',
            'plate_number' => 'required|string',
            'seal_number' => 'required|string',
            'photo_container' => 'required|image',
            'photo_seal' => 'required|image',
            'type_container' => 'required|string',
            'date_stuffing' => 'required|date',
        ];
    }
}
