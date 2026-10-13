<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRequest extends FormRequest
{
    /**
     * Autorización de la petición.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas para actualizar proveedores.
     */
    public function rules(): array
    {
        return [
            'razon_social' => ['sometimes', 'required', 'string', 'max:220'],
            'ruc'          => ['sometimes', 'required', 'string', 'digits:11'],
            'telefono'     => ['nullable', 'string', 'max:15'],
        ];
    }
}