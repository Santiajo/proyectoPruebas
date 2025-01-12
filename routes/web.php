<?php

use Illuminate\Support\Facades\Route;

// IMPORTAMOS CONTROLADOR PARA CATEGORIAS DE PRODUCTOS
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

// RUTAS PARA CATEGORIAS DE PRODUCTOS
    // PARA MOSTRAR La PÁGINA DEL CRUD
    Route::get('/categorias/crudCategoria', [CategoriaController::class, 'crudCategoria'])->name('categorias.crudCategoria');
    // PARA PROCESAR EL FORMULARIO Y GUARDAR O ACTULIZAR LA CATEGORÍA
    Route::post('/categorias', [CategoriaController::class, 'guardarCategoria'])->name('categorias.guardarCategoria');
    // PARA ELIMINAR UNA CATEGORÍA
    Route::delete('/categorias/{id}', [CategoriaController::class, 'eliminarCategoria'])->name('categorias.eliminarCategoria');