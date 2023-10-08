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
				<form name="restablecer" action="gtareas-codigo" method="post">
                    {{ csrf_field() }}

                    <input type="text" name="codigo" placeholder="Código" size="60" value="{{ old('codigo') }}" />
					<input type="hidden" name="token" value="{{ csrf_token() }}" />

                    <div class="btn-grupo">
                        <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Confirmar</button>
					</div>

                    <div class="regis-reset">
                        <div class="instrucciones">
                            <p>Ingrese el código que le fue enviado a su correo electrónico,</p>
                            <p>para confirmar el restablecimiento de la contraseña.</p>
                        </div>
                        <br>
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

