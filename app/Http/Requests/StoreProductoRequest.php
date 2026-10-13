<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Autorización de la petición.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas para registrar un nuevo producto.
     */
public function rules(): array
{
    return [
        'nombre'      => ['required', 'string', 'max:255'],
        'descripcion' => ['nullable', 'string'],
        'precio'      => ['required', 'numeric', 'min:0.01'], 
        'stock'       => ['required', 'integer', 'min:0'],      
    ];
}

    /**
     * Mensajes personalizados.
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre del producto es requerido.',
            'precio.required' => 'El precio del producto no puede estar vacío.',
            'precio.min'      => 'El precio debe ser mayor a cero.',
        ];
    }
}