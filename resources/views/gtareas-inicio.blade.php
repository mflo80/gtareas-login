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
        @endif

        <div class="container">
            <div class="navbar">
                <tr>
                    @if( auth()->check() )
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
                    @endif
                </tr>
            </div>
        </div>

        <div class="container">
            <h3>Bienvenido</h3>
            <p>Página de prueba</p>

            <p>Nombre: {{ auth()->user()->nombre }}
            <p>Apellido: {{ auth()->user()->apellido }}
            <p>Correo electrónico: {{ auth()->user()->email }}
            <p>Token: {{ auth()->user()->token }}
            <p>Remember Token: {{ auth()->user()->remember_token }}

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

            @if (session('registro_correcto'))
                <strong>
                    {{ session()->get('registro_correcto') }}
                </strong>
                <br><br>
                    <hr size="1px" color="black">
                <br>
            @endif

        </div>
        </center>
    </body>
</html>
