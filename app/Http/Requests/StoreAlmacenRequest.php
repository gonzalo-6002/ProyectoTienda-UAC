<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlmacenRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta petición.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas de validación para la creación de almacenes.
     */
    public function rules(): array
    {
        return [
            'nombre_almacen' => ['required', 'string', 'max:200'],
            'tamaño'         => ['nullable', 'string', 'max:150'],
            'estado'         => ['required', 'boolean'],
        ];
    }

    /**
     * Mensajes personalizados para los errores de validación.
     */
    public function messages(): array
    {
        return [
            'nombre_almacen.required' => 'El nombre del almacén es obligatorio.',
            'nombre_almacen.max'      => 'El nombre no puede superar los 200 caracteres.',
            'estado.required'         => 'Debe especificar el estado del almacén.',
        ];
    }
}