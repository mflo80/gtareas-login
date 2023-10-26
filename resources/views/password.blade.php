@extends('plantilla-login')

@section('gtareas-login')

    <div class="contenedor">
        <div class="formulario">
            <img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />
            <form name="contrasena" action="password" method="post">
                @csrf

                <input type="password" id="password" name="password" placeholder="Nueva Contraseña" size="255" min="6" />

                <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirmar Contraseña" size="255" min="6" />

                <input type="hidden" name="token" value="{{ $token }}" />

                <input type="hidden" name="email" value="{{ $datos['email'] }}" />

                <div class="btn-grupo">
                    <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Aceptar</button>
                </div>
            </form>

            <div class="texto-grupo">
                <p class="texto-mensaje">Hola {{ $datos['nombre'] }} {{ $datos['apellido'] }}.</p>
                <p class="texto-mensaje">Ingrese la nueva contraseña, para realizar el cambio.</p>

                <div class="login-link">
                    <p>¿Ya tienes cuenta?
                        <a href="login">Iniciar Sesión</a>
                    </p>
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
