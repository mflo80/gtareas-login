<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view('tareas.inicio');
    }

    public function crear_tarea()
    {
        return view('tareas.crear');
    }
}
