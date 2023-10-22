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

        return view('login');
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

        if($response->getStatusCode() == 200 && Auth::attempt($credenciales)){
            request()->session()->regenerate();

            $user = Auth::user();
			$token = $valores['token'];
            $userData = [
                'id' => $user->id,
                'token' => $token,
            ];

            $cookie = Cookie('token', json_encode($userData), getenv('SESSION_EXPIRATION'));

            return redirect()->route('inicio')->withErrors([
                'message' => $valores['message'],
            ])->withCookie($cookie);
        }

        if($response->getStatusCode() == 401){
            return back()->withErrors([
                'message' => $valores['message'],
            ])->onlyInput('email');
        }
	}

    public function logout(Request $request)
    {
        if(Cookie::has('token')){
            $userData = Cookie::get('token');
            $token = json_decode($userData)->token;

            if(isset($token)){
                $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                ->get(getenv('GTOAUTH_LOGOUT'));

                $valores = json_decode($response->body(), true);

                if($response->successful()){
                    Cache::forget('token');
                    Cookie::queue(Cookie::forget('token'));

                    $request->session()->invalidate();
                    Auth::guard('user')->logout();

                    return redirect()->to('login')->withErrors([
                        'message' => $valores['message'],
                    ]);
                }
            }
        }

#        $request->session()->invalidate();

        return back()->withErrors([
            'message' => 'Error al cerrar sesión.'
        ]);
    }
}
