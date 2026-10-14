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
        Schema::create('stock__almacen', function (Blueprint $table) {
            $table->id();
            $table->foreignID('almacen_id')->constrained('almacenes')->cascadeOnDelete();
            $table->foreignID('producto_id')->constrained('productos')->cascadeOnDelete();
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock__almacen');
    }
};
