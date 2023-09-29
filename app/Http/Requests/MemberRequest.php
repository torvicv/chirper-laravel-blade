<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|min:3|max:255',
            'position' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:10|max:500',
            'updated_at' => 'nullable|date',
            'created_at' => 'nullable|date'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'string' => 'El campo :attribute debe ser una cadena de texto',
            'min' => 'El campo :attribute debe tener mínimo :min caracteres',
            'max' => 'El campo :attribute debe tener máximo :max caracteres',
            'date' => 'El campo :attribute debe ser una fecha'
        ];
    }
}
