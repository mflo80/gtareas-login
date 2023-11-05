<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index(){
        if(auth()->check()) {
            return redirect()->to('inicio');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Debe ingresar el correo electrónico.',
            'password.required' => 'Debe ingresar la contraseña.'
        ]);

        $response = Http::withHeaders([ "Accept" => "application/json"])
            -> post(getenv("GTOAUTH_LOGIN"), $credenciales);

        $valores = json_decode($response->body(), true);

        if($response->getStatusCode() == 200){
            request()->session()->regenerate();

            $userData = [
                'token' => $valores['token'],
                'usuario' => $valores['usuario']
            ];

            $cookie = Cookie('gtoken', json_encode($userData), getenv('SESSION_LIFETIME'));

            return redirect()->route('tareas.inicio')->with([
                'usuario' => $valores['usuario'],
            ])->withErrors([
                'message' => $valores['message'],
            ])->withCookie($cookie);
        }

        if($response->getStatusCode() == 401 || $response->getStatusCode() == 500){
            return back()->withErrors([
                'message' => $valores['message'],
            ])->onlyInput('email');
        }
	}

    public function logout(Request $request)
    {
        try {
            if(Cookie::has('gtoken')){
                $userData = Cookie::get('gtoken');
                $token = json_decode($userData)->token;

                if(isset($token)){
                    $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                    ->get(getenv('GTOAUTH_LOGOUT'));

                    $valores = json_decode($response->body(), true);

                    if($response->getStatusCode() == 200 ||
                        $response->getStatusCode() == 403 ||
                        $response->getStatusCode() == 404 ||
                        $response->getStatusCode() == 500){

                        $message = $valores['message'];
                    }
                }
            }

            if(Cookie::has('gtoken') == null){
                $message = 'Tu sesión ha expirado.';
            }

            Cache::forget('gtoken');
            Cookie::queue(Cookie::forget('gtoken'));

            $request->session()->invalidate();
            Auth::guard('user')->logout();

            return redirect()->to('login')->withErrors([
                'message' => $message,
            ]);
        } catch (\Exception $e) {
            return redirect()->to('login')->withErrors([
                'message' => 'Error al cerrar sesión.'
            ]);
        }
    }
}
