<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlmacenController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\ProveedorController;

Route::apiResource('almacenes', AlmacenController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('proveedores', ProveedorController::class);