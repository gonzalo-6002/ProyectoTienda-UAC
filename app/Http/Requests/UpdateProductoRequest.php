<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    /**
     * Autorización de la petición.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas para actualizar productos.
     */
    public function rules(): array
    {
        return [
            'nombre'      => ['sometimes', 'required', 'string', 'max:180'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            'precio'      => ['sometimes', 'required', 'numeric', 'min:0.01'],
        ];
    }
}