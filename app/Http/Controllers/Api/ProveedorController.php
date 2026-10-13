<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::paginate(10);

        return response()->json([
            'success' => true,
            'data'    => $proveedores
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProveedorRequest $request)
    {
        $datosValidados = $request->validated();
        $nuevoProveedor = Proveedor::create($datosValidados);

        return response()->json([
            'success' => true,
            'message' => 'Proveedor registrado exitosamente.',
            'data'    => $nuevoProveedor
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return response()->json([
            'success' => true,
            'data'    => $proveedor
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        $datosActualizados = $request->validated();
        $proveedor->update($datosActualizados);

        return response()->json([
            'success' => true,
            'message' => 'Los datos del proveedor han sido actualizados.',
            'data'    => $proveedor
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return response()->json([
            'success' => true,
            'message' => 'El proveedor se eliminó correctamente del sistema.'
        ], 200);
    }
}