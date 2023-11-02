@extends('tareas.plantilla')

@section('gtareas-inicio')

<div class="contenedor-crear">
    <div class="formulario-crear">
        <div class="titulo-crear">
            <legend>Crear Tarea</legend>
        </div>

        <form id="crear-tarea" action="crear-tarea" method="post">
            @csrf

            <div class="titulo-input">
                <input type="text" id="titulo" name="titulo" placeholder="Título" size="255" value="{{ old('titulo') }}" autofocus />
            </div>

            <textarea id="texto" name="texto" placeholder="Ingrese aquí el texto de la tarea..." value="{{ old('texto') }}"></textarea>

            <div class="fecha">
                <label for="fecha-inicio">Fecha de inicio:</label>
                <input type="datetime-local" id="fecha-inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
            </div>

            <div class="fecha">
                <label for="fecha-fin">Fecha de fin:</label>
                <input type="datetime-local" id="fecha-fin" name="fecha_fin" value="{{ old('fecha_fin') }}">
            </div>

            <div class="categoria">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria">
                    <option value="1">Identificación</option>
                    <option value="2">Planificación</option>
                    <option value="3">Ejecución</option>
                    <option value="4">Control</option>
                    <option value="5">Finalización</option>
                </select>
            </div>

            <div class="btn-grupo">
                <button type="button" class="btn btn-primary btn-block btn-large btn-borrar"
                    onClick="location.href='crear-tarea'">Borrar</button>
                <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Crear</button>
            </div>
        </form>
    </div> <!-- Fin Clase Formulario Crear -->
</div> <!-- Fin Clase Contenedor Crear -->

<script>window.document.title = 'Gestor de Tareas - Crear Tarea';</script>

<script src="{{ asset('js/tareas/crear.js') }}"></script>

@endsection



