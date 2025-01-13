@extends('plantilla.plantilla')

@section('title', 'CRUD Categorias')

@section('content')
<!-- FORMULARIO DE CATEGORIAS -->
<form action="{{ route('categorias.guardarCategoria') }}" method="POST">
    @csrf
    <div>
        <h3>AÑADIR CATEGORÍA DE PRODUCTO</h3>
    </div>
    <div>
        <input type="hidden" id="idCategoria" name="idCategoria">
    </div>
    <div>
        <label for="nombreCategoria">Nombre:</label>
        <input type="text" id="nombreCategoria" name="nombreCategoria" required>
    </div>
    <div>
        <label for="descripcionCategoria">Descripción:</label>
        <textarea id="descripcionCategoria" name="descripcionCategoria"></textarea>
    </div>
    <button type="submit">Guardar</button>
</form>

<hr>

<!-- LISTAR CATEGORIAS -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <button onclick="editarCategoria({{ $categoria }})">Editar</button>

                    <form action="{{ route('categorias.eliminarCategoria', $categoria->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    // LLENAR EL FORMULARIO AL DARLE CLICK EN EDITAR
    function editarCategoria(categoria) {
        document.getElementById('idCategoria').value = categoria.id;
        document.getElementById('nombreCategoria').value = categoria.nombre;
        document.getElementById('descripcionCategoria').value = categoria.descripcion;
    }
</script>

@endsection