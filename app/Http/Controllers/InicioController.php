<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class InicioController extends Controller
{
    public function index()
    {
        $userData = $this->getActiveUserToken();
        $token = json_decode($userData)->token;
        $usuario = json_decode($userData)->usuario;

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
            'message' => "Error al obtener las tareas",
        ]);
    }

    public function ayuda()
    {
        $userData = $this->getActiveUserToken();
        $usuario = json_decode($userData)->usuario;

        return view('tareas.ayuda', ['usuario' => $usuario]);
    }

    public function buscar()
    {
        $userData = $this->getActiveUserToken();
        $usuario = json_decode($userData)->usuario;

        return view('tareas.buscar', ['usuario' => $usuario]);
    }

    public function historial_comentarios()
    {
        $userData = $this->getActiveUserToken();
        $usuario = json_decode($userData)->usuario;

        return view('historial.comentarios', ['usuario' => $usuario]);
    }

    public function historial_tareas()
    {
        $userData = $this->getActiveUserToken();
        $usuario = json_decode($userData)->usuario;

        return view('historial.tareas', ['usuario' => $usuario]);
    }

    public function getActiveUserToken()
    {
        $userData = Cookie::get('gtoken');
        return $userData;
    }
}
