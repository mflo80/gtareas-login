<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <title>Gestor de Tareas</title>
</head>
    <body>
        <header>
            <div class="titulo">
                <h1>Gestor de Tareas</h1>
            </div>
        </header>

        <div class="login">
            <form action="gtareas-login" method="post">
                {{ csrf_field() }}
                <div class="table">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" size="35" required autocomplete="email" autofocus>
                    <input type="password" name="password" placeholder="Contraseña" size="30" required>
                    <input type="hidden" name="token" value="{{ csrf_token() }}" />
                    <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>
            </form>

            @error('message')
                    {{ $message }}
            @enderror
        </div>

        <footer>
            <div class="footer-texto">
                <p>Todos los derechos reservados ® Marcelo Florio 2023</p>
            </div>
        </footer>
    </body>
</html>

