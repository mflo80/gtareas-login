<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

        if($response->getStatusCode() == 200){
            Cache::add($valores['token'], $valores['datos'], now()->addMinutes(15));
        }

        return back()->withErrors([
            'message' => $valores['message'],
        ])->onlyInput('email');
    }

    public function gotoRestablecer()
    {
        return redirect()->route('gtareas-restablecer');
    }

    public function formPassword($token)
    {
        if(Cache::get($token)){
            $datos = Cache::get($token);
            return view('gtareas-password', ['token' => $token])->with('datos', $datos);
        }

        return redirect()->route('gtareas-login')->withErrors([
            'message' => 'Página no encontrada.',
        ]);
    }

    public function cambiarPassword(Request $request)
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
			if(Cache::get($datos['token'])){
				Cache::forget($datos['token']);
			}
            return redirect()->route('gtareas-login')->withErrors([
                'message' => $valores['message'],
            ])->onlyInput('email');
        }
    }
}
