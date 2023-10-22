@extends('plantilla-inicio')

@section('gtareas-inicio')
    <nav>
        <div class="titulo">
            <a>Gestor de Tareas</a>
        </div>

        <ul class="menu">
            <li><a href="inicio">Inicio</a></li>
            <li><a href="crear">Crear Tarea</a></li>
            <li><a href="logout">Cerrar Sesión</a></li>
            <div class="usuario">
                <a>({{ auth()->user()->nombre }} {{ auth()->user()->apellido }})</a>
            </div>
        </ul>
        <a href="#" class="toggle"><i class="fas fa-bars"></i></a>
    </nav>

    <div class="sectores">
        <div class="sector sector-1">
            <div>
                <a class="sector-titulo">Identificación</a>
            </div>
        </div>
        <div class="sector sector-2">
            <div>
                <a class="sector-titulo">Planificación</a>
            </div>
        </div>
        <div class="sector sector-3">
            <div>
                <a class="sector-titulo">Ejecución</a>
            </div>
        </div>
        <div class="sector sector-4">
            <div>
                <a class="sector-titulo">Control</a>
            </div>
        </div>
        <div class="sector sector-5">
            <div>
                <a class="sector-titulo">Finalización</a>
            </div>
        </div>
    </div>

    <script>
        window.document.title = 'Gestor de Tareas';
    </script>

@endsection

