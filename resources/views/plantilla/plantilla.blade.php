<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> Estilo opcional -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('inicio.inicio') }}">Inicio</a></li>
                <li><a href="{{ route('categorias.crudCategoria') }}">Categorias</a></li>
                <li><a href="{{ route('productos.crudProducto') }}">Productos</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Mi Aplicación. Todos los derechos reservados.</p>
    </footer>
</body>
</html>