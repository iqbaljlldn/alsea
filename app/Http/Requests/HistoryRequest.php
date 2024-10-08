<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
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
            'containerable_id' => 'sometimes|integer',
            'containerable_type' => 'sometimes|string|in:App\Models\Fcl_container, App\Models\Lcl_container',
            'user_id' => 'required|exists:users,id',
            'action_type' => 'required|string',
        ];
    }
}
