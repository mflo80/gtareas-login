<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/general.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/restablecer.css') }}" rel="stylesheet">
    <title>Gestor de Tareas - Restablecer Contraseña</title>
</head>
    <body>
		<div class="contenedor">
			<div class="formulario">
				<img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />
				<form name="restablecer" action="gtareas-restablecer" method="post">
                    {{ csrf_field() }}

                    <input type="email" name="email" placeholder="Correo Electrónico" size="60" value="{{ old('email') }}" />
					<input type="hidden" name="token" value="{{ csrf_token() }}" />

                    <div class="btn-grupo">
                        <input type="button" name="Cancelar" value="Cancelar" class="btn btn-primary btn-block btn-large btn-cancelar"
                               onClick="window.location.href='gtareas-login';">
                        <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Enviar</button>
					</div>

                    <div class="regis-reset">
                        <div class="restablecer-error">
                            @foreach ($errors->all() as $message)
                                <p id="error">{{ $message }}</p>
                                @break
                            @endforeach
                        </div>
                        <div class="instrucciones">
                            <p>Para restablecer su contraseña, ingrese su correo electrónico</p>
                            <p>y seleccione enviar, para que le lleguen a éste las instrucciones.</p>
                        </div>

                        <p class="registrar">¿No tienes cuenta en Gestor de Tareas?
                            <a href="gtareas-registro" class="registro">Registrar</a>
                        </p>

                        <a href="gtareas-login" class="login">Iniciar Sesión</a>
					</div>
				</form>
                <div class="error_message">
                    @foreach ($errors->all() as $message)
                        <ul><li>{{ $message }}</li></ul>
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

