<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TareaController extends Controller
{
    public function index()
    {
        $token = session('gtoken');
        $usuario = $this->getActiveUserToken();

        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer $token"
        ])->get(getenv('GTAPI_TAREAS'));

        if ($response->successful()) {
            $tareas = json_decode($response->body(), true);
            $tareas = $tareas['tareas'] ?? [];

            $tareasPorCategoria = [];
            foreach ($tareas as $tarea) {
                $tareasPorCategoria[$tarea['categoria']][] = $tarea;
            }

            return view('tareas.inicio', ['tareasPorCategoria' => $tareasPorCategoria], ['usuario' => $usuario]);
        }

        return redirect()->to('logout')->withErrors([
            'message' => "Error al obtener las tareas.",
        ]);
    }

    public function form_crear()
    {
        $usuario = $this->getActiveUserToken();

        return view('tareas.crear', ['usuario' => $usuario]);
    }

    public function guardar(Request $request)
    {
        $token = session('gtoken');
        $usuario = $this->getActiveUserToken();

        $datos = $request->validate([
            'titulo' => ['required', 'string'],
            'texto' => ['required', 'string'],
            'fecha_hora_inicio' => ['required', 'date_format:Y-m-d\TH:i'],
            'fecha_hora_fin' => ['required', 'date_format:Y-m-d\TH:i'],
            'categoria' => ['required', 'string'],
            'estado' => ['required', 'string'],
        ], [
            'titulo.required' => 'Debe ingresar el título de la tarea.',
            'texto.required' => 'Debe ingresar el texto de la tarea.',
        ]);

        $fechaHoraInicio = DateTime::createFromFormat('Y-m-d\TH:i', $datos['fecha_hora_inicio']);
        $datos['fecha_hora_inicio'] = $fechaHoraInicio->format('Y-m-d H:i:s');

        $fechaHoraFin = DateTime::createFromFormat('Y-m-d\TH:i', $datos['fecha_hora_fin']);
        $datos['fecha_hora_fin'] = $fechaHoraFin->format('Y-m-d H:i:s');

        $datos['id_usuario'] = $usuario['id'];

        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer $token"
        ])->post(getenv("GTAPI_TAREAS"), $datos);

        $valores = json_decode($response->body(), true);

        if($response->getStatusCode() == 200){
            return redirect()->route('tareas.crear')->withErrors([
                'message' => $valores['message'],
            ]);
        }

        return redirect()->route('tareas.crear')->withErrors([
            'message' => $valores['message'],
        ]);
    }

    public function form_modificar($id)
    {
        $token = session('gtoken');
        $usuario = $this->getActiveUserToken();

        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer $token"
        ])->get(getenv('GTAPI_TAREAS')."/".$id);

        $valores = json_decode($response->body(), true);

        if ($response->successful()) {
            $tarea = json_decode($response->body(), true);
            $tarea = $tarea['tarea'] ?? [];

            return view('tareas.modificar', ['id' => $id, 'usuario' => $usuario, 'tarea' => $tarea]);
        }

        return redirect()->route('tareas.error')->withErrors([
            'message' => $valores['message'],
        ]);
    }

    public function actualizar(Request $request)
    {
        $token = session('gtoken');
        $usuario = $this->getActiveUserToken();

        $tarea = $request->validate([
            'id' => ['required', 'string'],
            'titulo' => ['required', 'string'],
            'texto' => ['required', 'string'],
            'fecha_hora_inicio' => ['required', 'date_format:Y-m-d\TH:i'],
            'fecha_hora_fin' => ['required', 'date_format:Y-m-d\TH:i'],
            'categoria' => ['required', 'string'],
            'estado' => ['required', 'string'],
        ], [
            'titulo.required' => 'Debe ingresar el título de la tarea.',
            'texto.required' => 'Debe ingresar el texto de la tarea.',
        ]);

        $fechaHoraInicio = DateTime::createFromFormat('Y-m-d\TH:i', $tarea['fecha_hora_inicio']);
        $tarea['fecha_hora_inicio'] = $fechaHoraInicio->format('Y-m-d H:i:s');

        $fechaHoraFin = DateTime::createFromFormat('Y-m-d\TH:i', $tarea['fecha_hora_fin']);
        $tarea['fecha_hora_fin'] = $fechaHoraFin->format('Y-m-d H:i:s');

        $tarea['id_usuario'] = $usuario['id'];

        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer $token"
        ])->put(getenv("GTAPI_TAREAS")."/".$tarea['id'], $tarea);

        $valores = json_decode($response->body(), true);

        if($response->getStatusCode() == 200){
            return redirect()->route('tareas.modificar', ['id' => $tarea['id']])->withErrors([
                'message' => $valores['message'],
            ]);
        }

        return redirect()->route('tareas.inicio')->withErrors([
            'message' => $valores['message'],
        ]);
    }
}
