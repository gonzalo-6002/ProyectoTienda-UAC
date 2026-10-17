<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController; // En plural

Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index'); 

Route::resource('productos', ProductosController::class); // En plural