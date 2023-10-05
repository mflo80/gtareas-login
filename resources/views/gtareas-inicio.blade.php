<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
</head>
    <body>
        <center>
        <h1>Gestor de Tareas</h1>

        @if( auth()->check() )
            <p>
                «-« {{ auth()->user()->nombre }} {{ auth()->user()->apellido }} »-»
            </p>

            <div class="container">
                <div class="navbar">
                    <tr>
                        <td>
                            <a href="gtareas-inicio">Inicio</a>
                        </td>
                        <td>
                            ---
                        </td>
                        <td>
                            <a href="gtareas-crear">Crear Tarea</a>
                        </td>
                        <td>
                            ---
                        </td>
                        <td>
                            <a href="gtareas-logout">Cerrar Sesión</a>
                        </td>
                    </tr>
                </div>
            </div>
        @endif

        <div class="container">
            <h3>Bienvenido</h3>
            <p>Página de prueba</p>

            <p>Nombre: {{ auth()->user()->nombre }}
            <p>Apellido: {{ auth()->user()->apellido }}
            <p>Correo electrónico: {{ auth()->user()->email }}

            <br>
                <hr size="1px" color="black">
            <br>

            @error('message')
                <strong>
                    {{ $message }}
                </strong>
                <br><br>
                    <hr size="1px" color="black">
                <br>
            @enderror

        </div>
        </center>
    </body>
</html>
