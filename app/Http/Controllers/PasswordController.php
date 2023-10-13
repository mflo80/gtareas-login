<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PasswordController extends Controller
{
    public function formRestablecer()
    {
        return view('gtareas-restablecer');
    }

    public function sendRestablecer(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email', 'string']
        ], [
            'email.required' => 'Debe ingresar el correo electrónico.'
        ]);

        $response = Http::withHeaders([ "Accept" => "application/json"])
            -> get(getenv("GTOAUTH_PASSWORD"), $credenciales);

        $valores = json_decode($response->body(), true);

        return back()->withErrors([
            'message' => $valores['message'],
        ])->onlyInput('email');
    }

    public function gotoRestablecer()
    {
        return redirect()->route('gtareas-restablecer');
    }

    public function formContrasena($codigo)
    {
        return view('gtareas-password', ['codigo' => $codigo]);
    }

    public function cambiarPassword(Request $request)
    {
        $datos = $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'password.required' => 'Debe ingresar la contraseña.',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $response = Http::withHeaders([ "Accept" => "application/json"])
        -> put(getenv("GTOAUTH_PASSWORD"), $datos);

        $valores = json_decode($response->body(), true);

        if($response->getStatusCode() == 200){
            return redirect()->route('gtareas-login')->withErrors([
                'message' => $valores['message'],
            ]);
        }
    }
}
