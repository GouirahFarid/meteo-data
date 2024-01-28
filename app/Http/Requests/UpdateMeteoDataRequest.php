<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeteoDataRequest extends FormRequest
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
            'latitude' => ['required'],
            'longitude' => ['required'],
            'hourly_units' => ['required'],
            'hourly_data' => ['required', 'array'],
            'hourly_data.*.time' => ['required', 'string'],
            'hourly_data.*.temperature_2m' => ['required', 'numeric'],
        ];
    }
}
