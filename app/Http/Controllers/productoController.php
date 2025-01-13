<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO DE PRODUCTO
use App\Models\Producto;

// IMPORTAR MODELO DE CATEGORIAS
use App\Models\Categoria;

class productoController extends Controller
{
    public function crudProducto()
    {
        $productos = Producto::all(); // LISTAR PRODUCTOS
        $categorias = Categoria::all(); // LISTAR CATEGORIAS
        return view('productos.crudProducto', compact('productos'), compact('categorias'));
    }

    public function guardarProducto(Request $request)
    {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'nombreProducto' => 'required|string|max:25|regex:/^[^<>]*$/',
            'descripcionProducto' => 'nullable|string|max:255|regex:/^[^<>]*$/',
            'cantidadProducto' => 'required|integer|min:1|max:100000|regex:/^[^<>]*$/',
            'precioProducto' => 'required|numeric|regex:/^[^<>]*$/',
            'fecVencimientoProducto' => 'nullable|date|regex:/^[^<>]*$/',
            'disponibleProducto' => 'required|boolean|regex:/^[^<>]*$/',
            'categoriaProducto' => 'required|integer|exists:categorias,id|regex:/^[^<>]*$/',
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS EL PRODUCTO, SINO, LO CREAMOS
        if ($request->idProducto) {
            $producto = Producto::findOrFail($request->idProducto);
            $producto->update([
                'nombre' => $request->nombreProducto,
                'descripcion' => $request->descripcionProducto,
                'cantidad' => $request->cantidadProducto,
                'precio' => $request->precioProducto,
                'fecha_vencimiento' => $request->fecVencimientoProducto,
                'disponible' => $request->disponibleProducto,
                'categoria_id' => $request->categoriaProducto,
            ]);
            return redirect()->route('productos.crudProducto')->with('success', 'Producto actualizado correctamente.');
        } else {
            // CREAR NUEVA CATEGORIA
            Producto::create([
                'nombre' => $request->nombreProducto,
                'descripcion' => $request->descripcionProducto,
                'cantidad' => $request->cantidadProducto,
                'precio' => $request->precioProducto,
                'fecha_vencimiento' => $request->fecVencimientoProducto,
                'disponible' => $request->disponibleProducto,
                'categoria_id' => $request->categoriaProducto,
            ]);
            return redirect()->route('productos.crudProducto')->with('success', 'Producto creado correctamente.');
        }
    }

    public function eliminarProducto($id)
    {
        Producto::find($id)->delete();
        return redirect()->route('productos.crudProducto')->with('success', 'Producto eliminado correctamente.');
    }
}
