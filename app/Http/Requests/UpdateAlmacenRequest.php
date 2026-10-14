<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlmacenRequest extends FormRequest
{
    /**
     * Autorización de la petición.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas para actualizar almacenes.
     */
    public function rules(): array
    {
        return [
            'nombre_almacen' => ['sometimes', 'required', 'string', 'max:200'],
            'tamaño'         => ['nullable', 'string', 'max:150'],
            'estado'         => ['sometimes', 'boolean'],
        ];
    }
}