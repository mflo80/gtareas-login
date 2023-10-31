@extends('tareas.plantilla')

@section('gtareas-inicio')

<div class="sectores">
    <div class="sector sector-1">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Identificación</a>
            </div>
            @for ($i = 1; $i <= 5; $i++)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $i }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">Título {{ $i }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dapibus luctus neque, tempor lacinia magna iaculis at. Integer dignissim quam. </td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <?php
                                    $start = strtotime('-'.rand(1, 30).' days');
                                    $end = strtotime('+'.rand(1, 30).' days', $start);
                                ?>
                                <span>{{ date('Y-m-d H:i', $start) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ date('Y-m-d H:i', $end) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <a class="tarea-comentarios">Comentarios:<span>{{ rand(1, 20) }}</span></a>
                                <a class="tarea-usuarios">Usuarios:<span>{{ rand(1, 10) }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button class="modificar">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endfor
        </div>
    </div>
    <div class="sector sector-2">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Planificación</a>
            </div>
            @for ($i = 6; $i <= 7; $i++)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $i }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">Título {{ $i }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dapibus luctus neque, tempor lacinia magna iaculis at. Integer dignissim quam. </td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <?php
                                    $start = strtotime('-'.rand(1, 30).' days');
                                    $end = strtotime('+'.rand(1, 30).' days', $start);
                                ?>
                                <span>{{ date('Y-m-d H:i', $start) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ date('Y-m-d H:i', $end) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <a class="tarea-comentarios">Comentarios:<span>{{ rand(1, 20) }}</span></a>
                                <a class="tarea-usuarios">Usuarios:<span>{{ rand(1, 10) }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button class="modificar">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endfor
        </div>
    </div>
    <div class="sector sector-3">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Ejecución</a>
            </div>
            @for ($i = 8; $i <= 8; $i++)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $i }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">Título {{ $i }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dapibus luctus neque, tempor lacinia magna iaculis at. Integer dignissim quam. </td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <?php
                                    $start = strtotime('-'.rand(1, 30).' days');
                                    $end = strtotime('+'.rand(1, 30).' days', $start);
                                ?>
                                <span>{{ date('Y-m-d H:i', $start) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ date('Y-m-d H:i', $end) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <a class="tarea-comentarios">Comentarios:<span>{{ rand(1, 20) }}</span></a>
                                <a class="tarea-usuarios">Usuarios:<span>{{ rand(1, 10) }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button class="modificar">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endfor
        </div>
    </div>
    <div class="sector sector-4">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Control</a>
            </div>
            @for ($i = 9; $i <= 10; $i++)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $i }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">Título {{ $i }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dapibus luctus neque, tempor lacinia magna iaculis at. Integer dignissim quam. </td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <?php
                                    $start = strtotime('-'.rand(1, 30).' days');
                                    $end = strtotime('+'.rand(1, 30).' days', $start);
                                ?>
                                <span>{{ date('Y-m-d H:i', $start) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ date('Y-m-d H:i', $end) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <a class="tarea-comentarios">Comentarios:<span>{{ rand(1, 20) }}</span></a>
                                <a class="tarea-usuarios">Usuarios:<span>{{ rand(1, 10) }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button class="modificar">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endfor
        </div>
    </div>
    <div class="sector sector-5">
        <div class="tabla" ondragover="allowDrop(event)" ondrop="drop(event)">
            <div>
                <a class="sector-titulo">Finalización</a>
            </div>
            @for ($i = 11; $i <= 11; $i++)
                <table draggable="true" ondragstart="drag(event)" id="table-{{ $i }}">
                    <thead>
                        <tr>
                            <th class="tarea-titulo">Título {{ $i }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tarea-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dapibus luctus neque, tempor lacinia magna iaculis at. Integer dignissim quam. </td>
                        </tr>
                        <tr>
                            <td class="tarea-inicia">
                                <a>Inicia:</a>
                                <?php
                                    $start = strtotime('-'.rand(1, 30).' days');
                                    $end = strtotime('+'.rand(1, 30).' days', $start);
                                ?>
                                <span>{{ date('Y-m-d H:i', $start) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-finaliza">
                                <a>Finaliza:</a>
                                <span>{{ date('Y-m-d H:i', $end) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-datos">
                                <a class="tarea-comentarios">Comentarios:<span>{{ rand(1, 20) }}</span></a>
                                <a class="tarea-usuarios">Usuarios:<span>{{ rand(1, 10) }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tarea-botones">
                                <button class="ver">Ver</button>
                                <button class="modificar">Modificar</button>
                                <button class="comentar">Comentar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endfor
        </div>
    </div>
</div>

<script>
    window.document.title = 'Gestor de Tareas';
</script>

@endsection

