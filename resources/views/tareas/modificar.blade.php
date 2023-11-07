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
                <input type="text" id="titulo" name="titulo" placeholder='Titulo' size="255" value="{{ $tarea['titulo'] }}" autofocus />
            </div>

            <textarea id="texto" name="texto" placeholder="Ingrese aquí el texto de la tarea...">{{ $tarea['texto'] }}</textarea>

            <div class="fecha">
                <label for="fecha-inicio">Fecha de inicio:</label>
                <input type="datetime-local" id="fecha-inicio" name="fecha_hora_inicio" value="{{ date('Y-m-d\TH:i', strtotime($tarea['fecha_hora_inicio'])) }}">
            </div>

            <div class="fecha">
                <label for="fecha-fin">Fecha de fin:</label>
                <input type="datetime-local" id="fecha-fin" name="fecha_hora_fin" value="{{ date('Y-m-d\TH:i', strtotime($tarea['fecha_hora_fin'])) }}">
            </div>

            <div class="categoria">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria">
                    <option value="Análisis" {{ $tarea['categoria'] == 'Análisis' ? 'selected' : '' }}>Análisis</option>
                    <option value="Diseño" {{ $tarea['categoria'] == 'Diseño' ? 'selected' : '' }}>Diseño</option>
                    <option value="Implementación" {{ $tarea['categoria'] == 'Implementación' ? 'selected' : '' }}>Implementación</option>
                    <option value="Verificación" {{ $tarea['categoria'] == 'Verificación' ? 'selected' : '' }}>Verificación</option>
                    <option value="Mantenimiento" {{ $tarea['categoria'] == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
            </div>

            <div class="categoria">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado">
                    <option value="Activa" {{ $tarea['estado'] == 'Activa' ? 'selected' : '' }}>Activa</option>
                    <option value="Atrasada" {{ $tarea['estado'] == 'Atrasada' ? 'selected' : '' }}>Atrasada</option>
                    <option value="Cancelada" {{ $tarea['estado'] == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                    <option value="En espera" {{ $tarea['estado'] == 'En espera' ? 'selected' : '' }}>En espera</option>
                    <option value="Finalizada" {{ $tarea['estado'] == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
                </select>
            </div>

            <div class="btn-grupo">
                <button type="button" class="btn btn-primary btn-block btn-large btn-borrar"
                    onClick="location.href='modificar-tarea-{{ $tarea['id'] }}'">Restablecer</button>
                <button type="submit" class="btn btn-primary btn-block btn-large btn-registrar">Modificar</button>
            </div>
        </form>
    </div> <!-- Fin Clase Formulario Crear -->

    <div class="error-grupo">
        <div class="error-mensaje">
            @foreach ($errors->all() as $message)
                <p id="error">{{ $message }}</p>
            @break
        @endforeach
    </div>

</div> <!-- Fin Clase Contenedor Crear -->

<script>window.document.title = 'Gestor de Tareas - Modificar Tarea';</script>

<script src="{{ asset('js/tareas/modificar.js') }}"></script>

@endsection



