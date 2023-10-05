<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/general.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <title>Gestor de Tareas</title>
</head>
    <body>
		<div class="contenedor">
			<div class="formulario">

                <img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />

                <form action="gtareas-login" method="post">

                    {{ csrf_field() }}

                    <input id="email" type="email" name="email" placeholder="Correo Electrónico"
                        @if (@isset($datos[0]))
                            value="{{ $datos[0] }}"
                        @endif
                            size="35" autocomplete="email" autofocus />

                    <input type="password" name="password" placeholder="Contraseña"
                        @if (@isset($datos[1]))
                            value="{{ $datos[1] }}"
                        @endif
                            size="60" />

                    <input type="hidden" name="token" value="{{ csrf_token() }}" />

                    <div class="recuerdame">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>
                        <label class="recordar-label">
                            <input type="checkbox" class="recordar-check" name="remember"
                                @if (@isset($datos[2]))
                                    checked
                                @endif
                            />
                            <span>Recuérdame</span>
                        </label>
                    </div>

					<div class="regis-reset">
						<p>¿No tienes cuenta en Gestor de Tareas?
							<a href="gtareas-registro" class="registro">Registrar</a>
						</p>
                        <a href="gtareas-restablecer" class="restablecer">Restablecer contraseña</a>
					</div>

				</form>

                <div class="error_message">
                    @foreach ($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>

            </div>

        </div>

        <footer>
            <div class="footer-texto">
                <p>Gestor de Tareas v1.00 ® by Marcelo Florio (2023)</p>
            </div>
        </footer>

    </body>
</html>

