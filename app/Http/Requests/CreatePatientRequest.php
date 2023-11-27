<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'complaints' => 'required|string',
            'email' => 'required|string|unique:patients',
            'phone' => 'required|string|min:10',
            'card_number' => 'required|string|unique:patients',
            'diagnosis' => 'required|string',
            'image' => [
                'required',
                File::image()
                    ->max(2048),
            ],
        ];
    }
}
