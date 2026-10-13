<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Almacen;
use App\Http\Requests\StoreAlmacenRequest;
use App\Http\Requests\UpdateAlmacenRequest;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::paginate(10);
        
        return response()->json([
            'success' => true,
            'data'    => $almacenes
        ], 200);
    }

    public function store(StoreAlmacenRequest $request)
    {
        $datosValidados = $request->validated();
        $nuevoAlmacen = Almacen::create($datosValidados);

        return response()->json([
            'success' => true,
            'message' => 'Almacén registrado con éxito.',
            'data'    => $nuevoAlmacen
        ], 201);
    }

    public function show(Almacen $almacen)
    {
        return response()->json([
            'success' => true,
            'data'    => $almacen
        ], 200);
    }

    public function update(UpdateAlmacenRequest $request, Almacen $almacen)
    {
        $datosActualizados = $request->validated();
        $almacen->update($datosActualizados);

        return response()->json([
            'success' => true,
            'message' => 'Información de almacén actualizada correctamente.',
            'data'    => $almacen
        ], 200);
    }

    public function destroy(Almacen $almacen)
    {
        $almacen->delete();

        return response()->json([
            'success' => true,
            'message' => 'El almacén ha sido eliminado del sistema.'
        ], 200);
    }
}