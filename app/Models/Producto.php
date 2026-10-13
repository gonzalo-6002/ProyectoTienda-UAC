<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional, por seguridad)
    protected $table = 'productos';

    // Campos permitidos para registrar desde los JSON de Postman
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'almacen_id',
    ];
}
