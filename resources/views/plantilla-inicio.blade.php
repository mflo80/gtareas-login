<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de Tareas</title>
        <link href="{{ asset('/css/general.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/inicio.css') }}" rel="stylesheet">
    </head>
    <body>
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
