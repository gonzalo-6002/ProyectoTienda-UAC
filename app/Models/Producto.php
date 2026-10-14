<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'codigo_sku',
        'nombre',
        'descripcion',
        'precio',
        'stock',
    ];

    //public function stock(){
      //  return $this->belongsTo(stock_almacen::class);
    //}
    public function almacen()
    {
    return $this->belongsTo(Almacen::class, 'almacen_id');
    }
}