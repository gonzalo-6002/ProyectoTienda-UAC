<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Resources\ProductoResource;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        
        // Retornar la colección usando el Resource para formato consistente en API
        return ProductoResource::collection($productos);
        
        // O si prefieres la respuesta JSON nativa sin Resource:
        /*
        return response()->json([
            'success' => true,
            'data'    => $productos
        ], 200);
        */
    }

    public function store(StoreProductoRequest $request)
    {   
        $producto = Producto::create($request->validated());

        return (new ProductoResource($producto))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Producto $producto)
    {
        return new ProductoResource($producto);
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Los datos del producto han sido actualizados.',
            'data'    => new ProductoResource($producto)
        ], 200);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->json([
            'success' => true,
            'message' => 'El producto se eliminó correctamente del sistema.'
        ], 200);
    }
}