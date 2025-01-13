<?php

use App\Http\Controllers\inicioController;
use Illuminate\Support\Facades\Route;

// IMPORTAMOS CONTROLADOR PARA CATEGORIAS DE PRODUCTOS
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\productoController;

Route::get('/', function () {
    return view('/inicio/inicio');
});

// RUTAS PARA EL INICIO DE LA PAGINA
    // PARA MOSTRAR La PÁGINA DEL INICIO
    Route::get('/inicio/inicio', [inicioController::class, 'inicio'])->name('inicio.inicio');

// RUTAS PARA LOS PRODUCTOS
    // PARA MOSTRAR La PÁGINA DEL CRUD PRODUCTOS
    Route::get('/productos/crudProducto', [productoController::class, 'crudProducto'])->name('productos.crudProducto');
    // PARA PROCESAR EL FORMULARIO Y GUARDAR O ACTULIZAR LA CATEGORÍA
    Route::post('/productos', [productoController::class, 'guardarProducto'])->name('productos.guardarProducto');
    // PARA ELIMINAR UNA CATEGORÍA
    Route::delete('/productos/{id}', [productoController::class, 'eliminarProducto'])->name('productos.eliminarProducto');

// RUTAS PARA CATEGORIAS DE PRODUCTOS
    // PARA MOSTRAR La PÁGINA DEL CRUD DE CATEGORIAS
    Route::get('/categorias/crudCategoria', [CategoriaController::class, 'crudCategoria'])->name('categorias.crudCategoria');
    // PARA PROCESAR EL FORMULARIO Y GUARDAR O ACTULIZAR LA CATEGORÍA
    Route::post('/categorias', [CategoriaController::class, 'guardarCategoria'])->name('categorias.guardarCategoria');
    // PARA ELIMINAR UNA CATEGORÍA
    Route::delete('/categorias/{id}', [CategoriaController::class, 'eliminarCategoria'])->name('categorias.eliminarCategoria');