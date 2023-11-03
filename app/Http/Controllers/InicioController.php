<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InicioController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([ "Accept" => "application/json"])
        ->get(getenv('GTAPI_TAREAS'));

        $tareas = json_decode($response->body(), true);
        $tareas = $tareas['tareas'];

        $tareasPorCategoria = [];
        foreach ($tareas as $tarea) {
            $tareasPorCategoria[$tarea['categoria']][] = $tarea;
        }

        return view('tareas.inicio', ['tareasPorCategoria' => $tareasPorCategoria]);
    }
}
