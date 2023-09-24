<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:40',
            'email' => 'email|required',
            'password' => 'string|nullable|max:16',
            'confirm-password' => 'string|nullable|max:16',
            'users_ver' => 'nullable',
            'users_editar' => 'nullable',
            'users_borrar' => 'nullable',
            'posts_ver' => 'nullable',
            'posts_editar' => 'nullable',
            'posts_borrar' => 'nullable',
            'members_ver' => 'nullable',
            'members_editar' => 'nullable',
            'members_borrar' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre debe se una cadena de texto',
            'name.min' => 'El nombre debe contener 3 caracteres mínimo',
            'name.max' => 'El nombre debe contener 40 caracteres máximo',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser un correo válido',
            'password.string' => 'La contraseña debe ser una cadena de texto',
            'password.max' => 'La contraseña debe tener 16 caracteres máximo',
            'confirm-password.string' => 'La contraseña de confirmación debe ser una cadena de texto',
            'confirm-password.max' => 'La contraseña de confirmación debe tener 16 caracteres máximo',
            'boolean' => 'El campo ":attribute" debe ser verdadero o falso',
        ];
    }
}
