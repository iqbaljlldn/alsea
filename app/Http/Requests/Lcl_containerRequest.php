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
            'photo_truck' => 'required|file|mimes:jpg,jpeg,png,svg',
            'photo_sim' => 'required|file|mimes:jpg,jpeg,png,svg',
            'type_truck' => 'required|string',
            'size_truck' => 'required|string',
            'departure_time' => 'required|string',
            'arrival_time' => 'required|string',
            'in_factory_time' => 'required|string',
            'out_factory_time' => 'required|string',
            'in_warehouse_time' => 'required|string',
            'out_warehouse_time' => 'required|string',
        ];
    }
}
