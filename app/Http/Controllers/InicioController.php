<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class InicioController extends Controller
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

    public function ayuda()
    {
        $usuario = $this->getActiveUserToken();

        return view('tareas.ayuda', ['usuario' => $usuario]);
    }

    public function buscar()
    {
        $usuario = $this->getActiveUserToken();

        return view('tareas.buscar', ['usuario' => $usuario]);
    }

    public function historial_comentarios()
    {
        $usuario = $this->getActiveUserToken();

        return view('historial.comentarios', ['usuario' => $usuario]);
    }

    public function historial_tareas()
    {
        $usuario = $this->getActiveUserToken();

        return view('historial.tareas', ['usuario' => $usuario]);
    }
}
