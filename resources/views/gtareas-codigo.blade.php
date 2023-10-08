@extends('plantilla')

@section('gtareas')

    <div class="contenedor">
        <div class="formulario">
            <img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />
            <form name="restablecer" action="gtareas-codigo" method="post">
                {{ csrf_field() }}

                <input type="text" name="codigo" placeholder="Código" size="255" value="{{ old('codigo') }}" />

                <div class="btn-grupo">
                    <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Confirmar</button>
                </div>
            </form>

            <div class="texto-grupo">
                <p>Ingrese el código que le fue enviado a su correo electrónico,</p>
                <p>para confirmar el restablecimiento de la contraseña.</p>

                <div class="login-link">
                    <a href="gtareas-login">Iniciar Sesión</a>
                </div>

                <div class="error-grupo">
                    <div class="error-mensaje">
                        @foreach ($errors->all() as $message)
                            <p id="error">{{ $message }}</p>
                        @break
                    @endforeach
                </div>
            </div> <!-- Grupo Texto -->
        </div> <!-- Fin Formulario -->
    </div> <!-- Fin Contenedor -->

    <script>
        window.document.title = 'Gestor de Tareas - Restablecer Contraseña';
    </script>

@endsection
