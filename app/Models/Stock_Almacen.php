<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock_Almacen extends Model
{
    protected $table = 'stock_almacen';

    protected $fillable = [
        'almacen_id',
        'producto_id',
        'stock',
    ];

    //public function almacen()
    //{
      //  return $this->belongsTo(Almacen::class);
    //}
    public function productos()
    {
    return $this->hasManyThrough(Producto::class, stock_almacen::class);
    }
}
