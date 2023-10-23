<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de Tareas</title>
        <link href="{{ asset('/css/general.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/inicio.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/creartarea.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav>
            <div class="titulo">
                <a>Gestor de Tareas</a>
            </div>

            <ul class="menu">
                <li><a href="inicio" class="menu-opcion-1">Inicio</a></li>
                <li><a href="crear-tarea" class="menu-opcion-2">Crear Tarea</a></li>
                <li><a href="buscar" class="menu-opcion-3">Buscar</a></li>
                <li><a href="logout" class="menu-opcion-4">Cerrar Sesión</a></li>
                <div class="usuario">
                    <a>({{ auth()->user()->nombre }} {{ auth()->user()->apellido }})</a>
                </div>
            </ul>
            <a href="#" class="toggle"><i class="fas fa-bars"></i></a>
        </nav>

        @yield('gtareas-inicio')

        <footer>
            <div class="footer-texto">
                <p>Gestor de Tareas v1.00 ® by Marcelo Florio (2023)</p>
            </div>
        </footer>

        <script src="{{ asset('js/jQuery.js') }}"></script>
        <script src="{{ asset('js/inicio.js') }}"></script>
    </body>
</html>
