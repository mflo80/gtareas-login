@extends('tareas.plantilla')

@section('gtareas-inicio')

<div class="contenedor-modificar">
    <div class="formulario-modificar">
        <div class="titulo-modificar">
            <legend>Modificar Tarea</legend>
        </div>

        <form method="POST" action="{{ route('tareas.modificar', $tarea['id']) }}" id="formulario">
            @csrf
            @method('PUT')
            <input type="hidden" id="id" name="id" value="{{ $tarea['id'] }}">

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
                <button type="button" class="btn btn-primary btn-block btn-large btn-eliminar"
                    data-toggle="modal" data-target="#confirmDeleteModal"
                    data-url="{{ route('tareas.eliminar', $tarea['id']) }}">Eliminar</button>
                <button type="button" class="btn btn-primary btn-block btn-large btn-borrar"
                    onClick="location.href='modificar-tarea-{{ $tarea['id'] }}'">Restablecer</button>
                <button type="button" class="btn btn-primary btn-block btn-large btn-registrarbtn-registrar"
                    data-toggle="modal" data-target="#confirmModificarModal">Modificar</button>
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

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar esta tarea?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <a href="#" class="btn btn-danger" id="confirmDeleteButton">Si</a>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModificarModal" tabindex="-1" role="dialog" aria-labelledby="confirmModificarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="confirmModificarModalLabel">Confirmar modificación</h5>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres modificar esta tarea?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <a href="#" class="btn btn-danger" id="confirmModificarButton">Si</a>
            </div>
        </div>
        </div>
    </div>

</div> <!-- Fin Clase Contenedor Crear -->

<script>window.document.title = 'Gestor de Tareas - Modificar Tarea';</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="{{ asset('js/tareas/modificar.js') }}"></script>

@endsection



