@extends('plantilla-inicio')

@section('gtareas-inicio')
    <div class="contenedor">
        <div class="formulario">
            <h2>Crear tarea</h2>
            <form id="crear-tarea" action="crear_tarea" method="post">
                {{ csrf_field() }}

                <input type="text" id="titulo" name="titulo" placeholder="Título" size="255" value="{{ old('titulo') }}" autofocus />

                <textarea id="texto" name="texto" value="{{ old('texto') }}"></textarea>

                <label for="fecha-inicio">Fecha de inicio:</label>
                <input type="datetime-local" id="fecha-inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}">

                <label for="fecha-fin">Fecha de fin:</label>
                <input type="datetime-local" id="fecha-fin" name="fecha_fin" value="{{ old('fecha_fin') }}">

                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria">
                    <option value="1">Identificación</option>
                    <option value="2">Planificación</option>
                    <option value="3">Ejecución</option>
                    <option value="4">Control</option>
                    <option value="5">Finalización</option>
                </select>

                <div class="btn-grupo">
                    <button type="button" class="btn btn-primary btn-block btn-large btn-borrar"
                        onClick="location.href='registro'">Borrar</button>
                    <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Registrar</button>
                </div>
            </form>
        </div> <!-- Fin Formulario -->
    </div> <!-- Fin Contenedor -->

    <script>window.document.title = 'Gestor de Tareas - Crear Tarea';</script>
    <script src="{{ asset('js/creartarea.js') }}"></script>
@endsection

