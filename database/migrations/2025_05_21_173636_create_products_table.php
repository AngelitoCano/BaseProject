<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Se ejecuta al aplicar la migración (crear tabla)
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('name'); // Nombre del producto (requerido)
            $table->text('description'); // Descripción (requerido)
            $table->decimal('price', 10, 2); // Precio (10 dígitos, 2 decimales)
            $table->foreignId('category_id')->nullable(); // Relación con categorías (opcional)
            $table->string('image')->nullable(); // Imagen (opcional)
            $table->timestamps(); // created_at y updated_at
        });
    }

    // Se ejecuta al revertir la migración (eliminar tabla)
    public function down()
    {
        Schema::dropIfExists('products');
    }
};