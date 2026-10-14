<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_sku', 50)->unique()->nullable(); 
            $table->string('nombre', 120);
            $table->text('descripcion')->nullable(); 

            // Se agrega ->nullable() para que permita valores NULL
            $table->unsignedBigInteger('almacen_id')->nullable();

            $table->decimal('precio', 10, 2);
            $table->integer('stock')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};