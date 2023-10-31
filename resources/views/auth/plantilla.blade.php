<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/general.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/registro.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/restablecer.css') }}" rel="stylesheet">
    <title>Gestor de Tareas</title>
</head>

<body>
    <main>
        @yield('gtareas-auth')
    </main>

    <footer>
        <div class="footer-texto">
            <p>Gestor de Tareas v1.00 ® by Marcelo Florio (2023)</p>
        </div>
    </footer>

    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/plantilla.js') }}"></script>
</body>

</html>
