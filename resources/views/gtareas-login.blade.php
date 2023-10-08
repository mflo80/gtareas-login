@extends('plantilla')

@section('gtareas')

    <div class="contenedor">
        <div class="formulario">

            <img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />

            <form action="gtareas-login" method="post">

                {{ csrf_field() }}

                <input id="email" type="email" name="email" placeholder="Correo Electrónico" size="255" autocomplete="email"
                    value="{{ old('email') }}" autofocus />

                <input id="password" type="password" name="password" placeholder="Contraseña" size="255" />

                <div class="btn-grupo">
                    <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>
                </div>

                <div class="login-mensajes">
                    <p>¿No tienes cuenta en Gestor de Tareas?
                        <a href="gtareas-registro" class="registro">Registrar</a>
                    </p>
                    <a href="gtareas-restablecer" class="restablecer">Restablecer contraseña</a>
                </div>

            </form>

            <div class="error">
                @foreach ($errors->all() as $message)
                    <p id="error">{{ $message }}</p>
                    @break
                @endforeach
            </div>
        </div> <!-- Fin Formulario -->
    </div> <!-- Fin Contenedor -->

    <script>
        window.document.title = 'Gestor de Tareas - Iniciar Sesión';
    </script>

@endsection
