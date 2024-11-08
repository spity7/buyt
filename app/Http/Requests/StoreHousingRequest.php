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
            'phone' => 'required|string|max:20',
            'type' => 'required|string|max:50',
            'type_description' => 'nullable|string|max:500',
            'nb_rooms' => 'required|integer|min:1',
            'area' => 'required|string',
            'governorate' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'service_type' => 'required',
            'furnishing_status' => 'required',
            'price' => 'nullable|string',
            'description' => 'nullable|string|max:1000',
        ];
    }
}
