<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/registro.css') }}" rel="stylesheet">
    <title>Gestor de Tareas</title>
</head>
    <body>
		<div class="contenedor">
			<div class="formulario">
				<img class="logo" src="{{ asset('/img/logo.png') }}" alt="LOGO" />
				<form action="gtareas-registro" method="post">
                    <input type="text" name="nombre" placeholder="Nombre" size="50" required autofocus />
                    <input type="text" name="apellido" placeholder="Apellido" size="50" required />
					<input type="email" name="email" placeholder="Correo Electrónico" size="60" required />
					<input type="password" name="password" placeholder="Contraseña" size="60" min="6" required />
                    <input type="password" name="password-confirmed" placeholder="Confirmar Contraseña" size="60" min="6" required />
                    <div class="btn-grupo">
                        <input type="button" name="Cancelar" value="Cancelar" class="btn btn-primary btn-block btn-large btn-cancelar" onClick="window.location.href='gtareas-login';">
                        <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Registrar</button>
					</div>
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

