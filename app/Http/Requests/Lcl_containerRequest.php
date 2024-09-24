<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Lcl_containerRequest extends FormRequest
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
            'shipment_id' => 'required|exists:shipments,id',
            'driver_id' => 'required|exists:drivers,id',
            'plate_number' => 'required|string',
            'photo_truck' => 'required|image',
            'photo_sim' => 'required|image',
            'type_truck' => 'required|string',
            'size_truck' => 'required|string',
        ];
    }
}
