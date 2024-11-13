<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHousingRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|integer',
            'type' => 'required|string|max:50',
            'nb_rooms' => 'required|integer|min:1',
            'area' => 'required|integer',
            'governorate' => 'required|string|max:100',
            'service_type' => 'required',
            'furnishing_status' => 'required',
            'price' => 'nullable|string',
            'description' => 'required|string|max:1000',
        ];
    }
}
