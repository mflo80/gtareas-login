<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PasswordController extends Controller
{
    public function form_restablecer()
    {
        return view('auth.restablecer');
    }

    public function send_restablecer(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email', 'string']
        ], [
            'email.required' => 'Debe ingresar el correo electrónico.'
        ]);

        $response = Http::withHeaders([ "Accept" => "application/json"])
            -> post(getenv("GTOAUTH_PASSWORD"), $credenciales);

        $valores = json_decode($response->body(), true);

        return back()->withErrors([
            'message' => $valores['message'],
        ])->onlyInput('email');
    }

    public function goto_restablecer()
    {
        return redirect()->route('auth.restablecer');
    }

    public function form_password($tokenResetPassword)
    {
        $response = Http::withHeaders([ "Accept" => "application/json"])
        -> get(getenv("GTOAUTH_PASSWORD") . "/" . $tokenResetPassword);

        $valores = json_decode($response->body(), true);

        if($response->getStatusCode() == 200){
            $datos = $valores['datos'];
            return view('auth.password', ['token' => $tokenResetPassword])->with('datos', $datos);
        }

        return redirect()->route('auth.login')->withErrors([
            'message' => 'Página no encontrada.',
        ]);
    }

    public function cambiar_password(Request $request)
    {
        $datos = $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], [
            'password.required' => 'Debe ingresar la contraseña.',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $response = Http::withHeaders([ "Accept" => "application/json"])
        -> put(getenv("GTOAUTH_PASSWORD"), $datos);

        $valores = json_decode($response->body(), true);

        if($response->getStatusCode() == 200){
            return redirect()->route('auth.login')->withErrors([
                'message' => $valores['message'],
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'message' => $valores['message'],
        ])->onlyInput('email');
    }
}
