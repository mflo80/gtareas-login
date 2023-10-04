<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/general.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/registro.css') }}" rel="stylesheet">
    <title>Gestor de Tareas</title>
</head>
    <body>
		<div class="contenedor">
			<div class="formulario">
				<img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />
				<form action="gtareas-registro" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="nombre" placeholder="Nombre" size="60" value="{{ old('nombre') }}" autofocus />
                    <input type="text" name="apellido" placeholder="Apellido" size="60" value="{{ old('apellido') }}" />
					<input type="email" name="email" placeholder="Correo Electrónico" size="60" value="{{ old('email') }}" />
					<input type="password" name="password" placeholder="Contraseña" size="60" min="6" />
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" size="60" min="6" />
                    <input type="hidden" name="token" value="{{ csrf_token() }}" />
                    <div class="btn-grupo">
                        <input type="button" name="Cancelar" value="Cancelar" class="btn btn-primary btn-block btn-large btn-cancelar" onClick="window.location.href='gtareas-login';">
                        <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Registrar</button>
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

