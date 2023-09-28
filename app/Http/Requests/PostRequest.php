<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->permisos->where('pizarra', 'users')->first()->editar;
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
            'title' => 'required|string|min:5|max:255',
            'body' => 'required|string|min:10|max:1000',
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
