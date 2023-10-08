<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function restablecer()
    {
        return view('gtareas-restablecer');
    }

    public function codigo()
    {
        return view('gtareas-codigo');
    }

    public function contrasena()
    {
        return view('gtareas-contrasena');
    }
}
