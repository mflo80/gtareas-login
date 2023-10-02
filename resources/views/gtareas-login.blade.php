<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <title>Gestor de Tareas</title>
</head>
    <body>
		<div class="contenedor">
			<div class="formulario">
				<img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />
				<form action="gtareas-login" method="post">
					{{ csrf_field() }}
					<div class="table">
						<input id="email" type="email" class="form-control" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" size="35" required autocomplete="email" autofocus>
						<input type="password" name="password" placeholder="Contraseña" size="30" required>
						<input type="hidden" name="token" value="{{ csrf_token() }}" />
						<button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>
				</form>
			</div>
			<div class="error_message">
				@error('message')
					{{ $message }}
				@enderror
			</div>
		</div>
        <footer>
            <div class="footer-texto">
                <p>Gestor de Tareas v1.00 ® by Marcelo Florio (2023)</p>
            </div>
        </footer>
    </body>
</html>

