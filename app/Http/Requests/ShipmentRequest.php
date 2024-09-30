<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'mbl_number' => 'required|string',
            'do_number' => 'required|string',
            'si_number' => 'required|string',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'type' => 'required|string',
            'status_payment' => 'required|string',
            'planning_stuffing' => 'required|string',
            'status_shipment' => 'required|string'
        ];
    }
}
