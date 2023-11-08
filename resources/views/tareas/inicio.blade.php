@extends('tareas.plantilla')

@section('gtareas-inicio')

<div class="sectores">
    <div class="sector sector-1">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Análisis</a>
            </div>
            @forelse ($tareasPorCategoria['Análisis'] ?? [] as $tarea)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $tarea['id'] }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">{{ $tarea['titulo'] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">{{ $tarea['texto'] }}</td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <span>{{ $tarea['fecha_hora_inicio'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ $tarea['fecha_hora_fin'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <span class="tarea-id">
                                    <img class="icono-id" src="{{ asset('/img/tarea-id.png') }}" alt="Ícono de Identificación de Tarea" />
                                    <span>{{ $tarea['id'] }}</span>
                                </span>
                                <span class="tarea-comentarios">
                                    <img class="icono-comentario" src="{{ asset('/img/comentario-100.png') }}" alt="Ícono de Comentario" />
                                    <span>{{ rand(1, 20) }}</span>
                                </span>
                                <span class="tarea-usuarios">
                                    <img class="icono-usuario" src="{{ asset('/img/usuario-96.png') }}" alt="Ícono de Usuario" />
                                    <span>{{ rand(1, 10) }}</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button id="botonModificar-{{ $tarea['id'] }}" class="modificar"
                                    data-url="{{ route('tareas.modificar', $tarea['id']) }}">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @empty
            @endforelse
        </div>
    </div>
    <div class="sector sector-2">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Diseño</a>
            </div>
            @forelse ($tareasPorCategoria['Diseño'] ?? [] as $tarea)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $tarea['id'] }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">{{ $tarea['titulo'] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">{{ $tarea['texto'] }}</td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <span>{{ $tarea['fecha_hora_inicio'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ $tarea['fecha_hora_fin'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <span class="tarea-id">
                                    <img class="icono-id" src="{{ asset('/img/tarea-id.png') }}" alt="Ícono de Identificación de Tarea" />
                                    <span>{{ $tarea['id'] }}</span>
                                </span>
                                <span class="tarea-comentarios">
                                    <img class="icono-comentario" src="{{ asset('/img/comentario-100.png') }}" alt="Ícono de Comentario" />
                                    <span>{{ rand(1, 20) }}</span>
                                </span>
                                <span class="tarea-usuarios">
                                    <img class="icono-usuario" src="{{ asset('/img/usuario-96.png') }}" alt="Ícono de Usuario" />
                                    <span>{{ rand(1, 10) }}</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button id="botonModificar-{{ $tarea['id'] }}" class="modificar"
                                    data-url="{{ route('tareas.modificar', $tarea['id']) }}">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @empty
            @endforelse
        </div>
    </div>
    <div class="sector sector-3">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Implementación</a>
            </div>
            @forelse ($tareasPorCategoria['Implementación'] ?? [] as $tarea)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $tarea['id'] }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">{{ $tarea['titulo'] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">{{ $tarea['texto'] }}</td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <span>{{ $tarea['fecha_hora_inicio'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ $tarea['fecha_hora_fin'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <span class="tarea-id">
                                    <img class="icono-id" src="{{ asset('/img/tarea-id.png') }}" alt="Ícono de Identificación de Tarea" />
                                    <span>{{ $tarea['id'] }}</span>
                                </span>
                                <span class="tarea-comentarios">
                                    <img class="icono-comentario" src="{{ asset('/img/comentario-100.png') }}" alt="Ícono de Comentario" />
                                    <span>{{ rand(1, 20) }}</span>
                                </span>
                                <span class="tarea-usuarios">
                                    <img class="icono-usuario" src="{{ asset('/img/usuario-96.png') }}" alt="Ícono de Usuario" />
                                    <span>{{ rand(1, 10) }}</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button id="botonModificar-{{ $tarea['id'] }}" class="modificar"
                                    data-url="{{ route('tareas.modificar', $tarea['id']) }}">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @empty
            @endforelse
        </div>
    </div>
    <div class="sector sector-4">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Verificación</a>
            </div>
            @forelse ($tareasPorCategoria['Verificación'] ?? [] as $tarea)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $tarea['id'] }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">{{ $tarea['titulo'] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">{{ $tarea['texto'] }}</td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <span>{{ $tarea['fecha_hora_inicio'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ $tarea['fecha_hora_fin'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <span class="tarea-id">
                                    <img class="icono-id" src="{{ asset('/img/tarea-id.png') }}" alt="Ícono de Identificación de Tarea" />
                                    <span>{{ $tarea['id'] }}</span>
                                </span>
                                <span class="tarea-comentarios">
                                    <img class="icono-comentario" src="{{ asset('/img/comentario-100.png') }}" alt="Ícono de Comentario" />
                                    <span>{{ rand(1, 20) }}</span>
                                </span>
                                <span class="tarea-usuarios">
                                    <img class="icono-usuario" src="{{ asset('/img/usuario-96.png') }}" alt="Ícono de Usuario" />
                                    <span>{{ rand(1, 10) }}</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button id="botonModificar-{{ $tarea['id'] }}" class="modificar"
                                    data-url="{{ route('tareas.modificar', $tarea['id']) }}">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @empty
            @endforelse
        </div>
    </div>
    <div class="sector sector-5">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Mantenimiento</a>
            </div>
            @forelse ($tareasPorCategoria['Mantenimiento'] ?? [] as $tarea)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $tarea['id'] }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">{{ $tarea['titulo'] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">{{ $tarea['texto'] }}</td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <span>{{ $tarea['fecha_hora_inicio'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ $tarea['fecha_hora_fin'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <span class="tarea-id">
                                    <img class="icono-id" src="{{ asset('/img/tarea-id.png') }}" alt="Ícono de Identificación de Tarea" />
                                    <span>{{ $tarea['id'] }}</span>
                                </span>
                                <span class="tarea-comentarios">
                                    <img class="icono-comentario" src="{{ asset('/img/comentario-100.png') }}" alt="Ícono de Comentario" />
                                    <span>{{ rand(1, 20) }}</span>
                                </span>
                                <span class="tarea-usuarios">
                                    <img class="icono-usuario" src="{{ asset('/img/usuario-96.png') }}" alt="Ícono de Usuario" />
                                    <span>{{ rand(1, 10) }}</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button id="botonModificar-{{ $tarea['id'] }}" class="modificar"
                                    data-url="{{ route('tareas.modificar', $tarea['id']) }}">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @empty
            @endforelse
        </div>
    </div>
</div>

<script>
    window.document.title = 'Gestor de Tareas';
</script>

@endsection

