<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
{
    /**
     * Autorización de la petición.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas para registrar proveedores.
     */
    public function rules(): array
    {
        return [
            'razon_social' => ['required', 'string', 'max:220'],
            'ruc'          => ['required', 'string', 'digits:11', 'unique:proveedores,ruc'],
            'telefono'     => ['nullable', 'string', 'max:15'],
        ];
    }

    /**
     * Mensajes personalizados.
     */
    public function messages(): array
    {
        return [
            'razon_social.required' => 'La razón social es obligatoria.',
            'ruc.required'          => 'El número de RUC es obligatorio.',
            'ruc.digits'            => 'El RUC debe contener exactamente 11 dígitos.',
            'ruc.unique'            => 'Este RUC ya se encuentra registrado en el sistema.',
        ];
    }
}