@extends('plantilla.plantilla')

@section('title', 'CRUD Productos')

@section('content')

<!-- FORMULARIO DE CATEGORIAS -->
<form action="{{ route('productos.guardarProducto') }}" method="POST">
    @csrf
    <div>
        <h3>AÑADIR PRODUCTO</h3>
    </div>
    <div>
        <input type="hidden" id="idProducto" name="idProducto">
    </div>
    <div>
        <label for="nombreProducto">Nombre:</label>
        <input type="text" id="nombreProducto" name="nombreProducto" required>
        @error('nombreProducto')
            <div class="alert alert-danger">El nombre del producto debe de incluir solo letras y ser inferior a 25 carácteres!</div>
        @enderror
    </div>
    <div>
        <label for="descripcionProducto">Descripción:</label>
        <textarea id="descripcionProducto" name="descripcionProducto"></textarea>
        @error('descripcionProducto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="cantidadProducto">Cantidad:</label>
        <input type="number" id="cantidadProducto" name="cantidadProducto">
        @error('cantidadProducto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="precioProducto">Precio:</label>
        <input type="number" id="precioProducto" name="precioProducto">
        @error('precioProducto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="fecVencimientoProducto">Fecha vencimiento:</label>
        <input type="date" id="fecVencimientoProducto" name="fecVencimientoProducto">
        @error('fecVencimientoProducto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <fieldset>
            <legend>¿Disponible?</legend>
            <input type="radio" id="disponibleProductoSi" name="disponibleProducto" value="1">
            <label for="disponibleProductoSi">Sí</label>
            <input type="radio" id="disponibleProductoNo" name="disponibleProducto" value="0">
            <label for="disponibleProductoNo">No</label>
        </fieldset>
        @error('disponibleProducto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="categoriaProducto">Categoria:</label>
        <select name="categoriaProducto" id="categoriaProducto">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        @error('categoriaProducto')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Guardar</button>
</form>

<hr>

<!-- LISTADO DE PRODUCTO -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Fecha Vencimiento</th>
            <th>Disponible</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->fecha_vencimiento }}</td>
                @if ($producto->disponible == 1)
                    <td>Sí</td>
                @else
                    <td>No</td>
                @endif
                @foreach ($categorias as $categoria)
                    @if ($categoria->id == $producto->categoria_id)
                        <td>{{ $categoria->nombre }}</td>
                    @endif
                @endforeach
                <td>
                    <button onclick="editarProducto({{ $producto }})">Editar</button>

                    <form action="{{ route('productos.eliminarProducto', $producto->id) }}" method="POST"
                        style="display: inline;" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@if (session('success'))
    <script>
        Swal.fire({
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

<script>
    // LLENAR EL FORMULARIO AL DARLE CLICK EN EDITAR
    function editarProducto(producto) {
        document.getElementById('idProducto').value = producto.id;
        document.getElementById('nombreProducto').value = producto.nombre;
        document.getElementById('descripcionProducto').value = producto.descripcion;
        document.getElementById('cantidadProducto').value = producto.cantidad;
        document.getElementById('precioProducto').value = producto.precio;
        document.getElementById('fecVencimientoProducto').value = producto.fecha_vencimiento;
        document.getElementById('categoriaProducto').value = producto.categoria_id;

        if (producto.disponible == 1) {
            document.getElementById('disponibleProductoSi').checked = true;
        } else {
            document.getElementById('disponibleProductoNo').checked = true;
        }
    }

    // CONFIRMAR ELIMINACIÓN
    function confirmDelete(event) {
        event.preventDefault();
        const form = event.target;

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>

@endsection