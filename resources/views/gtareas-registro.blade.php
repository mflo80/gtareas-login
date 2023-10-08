<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">
    <link href="{{ asset('css/registro.css') }}" rel="stylesheet">
    <title>Gestor de Tareas - Registro</title>
</head>

<body>
    <div class="contenedor">
        <div class="formulario">
            <img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />
            <form name="registro" action="gtareas-registro" method="post">
                {{ csrf_field() }}

                <input type="text" id="nombre" name="nombre" placeholder="Nombre" size="60" value="{{ old('nombre') }}" autofocus />
                <input type="text" id="apellido" name="apellido" placeholder="Apellido" size="60" value="{{ old('apellido') }}" />
                <input type="email" id="email" name="email" placeholder="Correo Electrónico" size="60" value="{{ old('email') }}" />
                <input type="password" id="password" name="password" placeholder="Contraseña" size="60" min="6" />
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" size="60" min="6" />

                <input type="hidden" name="token" value="{{ csrf_token() }}" />

                <div class="btn-grupo">
                    <button type="button" class="btn btn-primary btn-block btn-large btn-borrar"  onClick="location.href='gtareas-registro'">Borrar</button>
                    <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Registrar</button>
                </div>
            </form>

            <div class="registro-mensajes">
                <div class="registro-error">
                    @foreach ($errors->all() as $message)
                        <p id="error">{{ $message }}</p>
                        @break
                    @endforeach
                </div>
                <div class="instrucciones">
                    <p>Una vez realizado el registro, deberá de confirmar su cuenta de</p>
                    <p>correo electrónico, ingresando a este y siguiendo los pasos en</p>
                    <p>el mensaje que le será enviado.</p>
                </div>
                <div class="login">
                    <a href="gtareas-login">Iniciar Sesión</a>
                </div>
            </div>
        </div> <!-- Fin Formulario -->
    </div> <!-- Fin Contenedor -->
    <footer>
        <div class="footer-texto">
            <p>Gestor de Tareas v1.00 ® by Marcelo Florio (2023)</p>
        </div>
    </footer>

    <script src="{{ asset('js/jQuery.js') }}"></script>

    <script>
        $(document).ready(() => {
            $('#nombre').keypress(function() {
                $('#error').hide();
            });
            $('#apellido').keypress(function() {
                $('#error').hide();
            });
            $('#email').keypress(function() {
                $('#error').hide();
            });
            $('#password').keypress(function() {
                $('#error').hide();
            });
            $('#password_confirmation').keypress(function() {
                $('#error').hide();
            });
        });
    </script>
</body>

</html>
