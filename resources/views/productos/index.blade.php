@extends('layouts.layout')

@section('contenido')
<div class="grid grid-cols-6 gap-3">

    <!-- Columna del Formulario para Registrar Producto -->
    <div class="col-span-2">
        <h1 class="text-3xl font-bold text-white">Lista de Productos</h1>
        <p class="text-yellow-300 italic">Bienvenido a la página de productos.</p>

        <!-- Formulario apuntando a productos.store -->
        <form action="{{ route('productos.store') }}" method="POST" class="mt-5 space-y-3">
            @csrf <!-- Token de seguridad de Laravel -->

            <input 
                type="text" 
                name="nombre" 
                placeholder="Nombre.." 
                required
                class="border border-gray-300 rounded py-2 px-4 w-full bg-white text-black"
            >
            
            <input 
                type="text" 
                name="descripcion" 
                placeholder="Descripción..." 
                required
                class="border border-gray-300 rounded py-2 px-4 w-full bg-white text-black"
            >

            <input 
                type="number" 
                step="0.01" 
                name="precio" 
                placeholder="Precio..." 
                required
                class="border border-gray-300 rounded py-2 px-4 w-full bg-white text-black"
            >

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                Guardar Producto
            </button>
        </form>
    </div>

    <!-- Columna de la Tabla de Productos -->
    <div class="col-span-4">
        <table class="table-auto w-full border border-gray-100 rounded-lg shadow-md text-white">
            <thead class="bg-gray-950 bg-opacity-25 p-4 text-left">
                <tr>
                    <th class="p-2 border-b">Nombre</th>
                    <th class="p-2 border-b">Descripción</th>
                    <th class="p-2 border-b">Precio</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr class="hover:bg-gray-800 transition">
                        <td class="p-2 border-b">{{ $producto->nombre }}</td>
                        <td class="p-2 border-b">{{ $producto->descripcion }}</td>
                        <td class="p-2 border-b">${{ number_format($producto->precio, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-4 text-center text-gray-400">No hay productos registrados.</td>
                    </tr>
                @endforelse 
            </tbody>
        </table>

        <!-- Enlaces de Paginación -->
        <div class="mt-4">
            {{ $productos->links() }}
        </div>
    </div>

</div>
@endsection