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
        // Modelo para la tabla de productos
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Integer auto incrementable
            $table->string('nombre'); // String para el nombre del producto
            $table->text('descripcion')->nullable(); // String para descripción de productos, puede ser un null
            $table->integer('cantidad'); // Integer para la cantidad del producto
            $table->decimal('precio', 8, 2); // Decimal para los precios de los productos, 8 números enteros y 2 decimales
            $table->date('fecha_vencimiento')->nullable(); // Fecha para el vencimiento del producto, puede ser un null
            $table->boolean('disponible')->default(true); // Boolean para saber si el producto está disponible, por defecto es true
            $table->timestamps(); // Timestamp del registro (fecha y hora en la que se crea o actualiza la tabla) 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback de la tabla de productos
        Schema::dropIfExists('productos');
    }

    
};
