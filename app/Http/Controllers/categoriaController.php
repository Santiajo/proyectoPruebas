<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO DE CATEGORIAS
use App\Models\Categoria;

class categoriaController extends Controller
{
    // MÉTODO PARA MOSTRAR LA PÁGINA DEL CRUD
    public function crudCategoria()
    {
        $categorias = Categoria::all(); // LISTAR CATEGORIAS
        return view('categorias.crudCategoria', compact('categorias'));
    }

    public function guardarCategoria(Request $request) {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'nombreCategoria' => 'required|string|max:255',
            'descripcionCategoria' => 'nullable|string',
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA CATEGORÍA, SINO, LA CREAMOS
        if ($request->idCategoria) {
            $categoria = Categoria::findOrFail($request->idCategoria);
            $categoria->update([
                'nombre' => $request->nombreCategoria,
                'descripcion' => $request->descripcionCategoria,
            ]);
            return redirect()->route('categorias.crudCategoria')->with('success', 'Categoría actualizada correctamente.');
        } else {
            // CREAR NUEVA CATEGORIA
            Categoria::create([
                'nombre' => $request->nombreCategoria,
                'descripcion' => $request->descripcionCategoria,
            ]);
            return redirect()->route('categorias.crudCategoria')->with('success', 'Categoría creada correctamente.');
        }
    }

    public function eliminarCategoria($id)
    {
        Categoria::find($id)->delete();
        return redirect()->route('categorias.crudCategoria')->with('success', 'Categoría eliminada correctamente.');
    }
}
