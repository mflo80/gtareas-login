<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index(){
        if( auth()->check() ) {
            return redirect()->to('gtareas-inicio');
        }

        if(Cache::get($this->datos_dispositivo())){
            $datos = Cache::get($this->datos_dispositivo());
            return view('gtareas-login', ['datos' => $datos]);
        }

        return view('gtareas-login');
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

            $remember = $request->has('remember');

            if(isset($remember)){
                if($remember){
                    Cache::set($this->datos_dispositivo(), [$credenciales['email'], $credenciales['password'], true], 60*24*365);
                } else {
                    Cache::delete($this->datos_dispositivo());
                }
            }

            Cache::set($this->datos_dispositivo() . 'token', $valores['token'], 60*6);

            return redirect()->route('gtareas-inicio')->with([
                'message' => $valores['message'],
            ]);
        }

        if($response->getStatusCode() == 401){
            return back()->withErrors([
                'message' => $valores['message'],
            ])->onlyInput('email');
        }
	}

    public function logout(Request $request)
    {
        if(Cache::get($this->datos_dispositivo().'token')){
            $token = Cache::get($this->datos_dispositivo().'token');
        }

        $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                    ->get(env('GTOAUTH_LOGOUT'));

        $valores = json_decode($response->body(), true);

        Auth::logout();
        $request->session()->invalidate();

        if(!isset($valores['message'])){
            return redirect()->to('gtareas-login');
        }

        if($response->getStatusCode() >= 200){
            return redirect()->to('gtareas-login')->withErrors([
                'message' => $valores['message'],
            ]);
        }

        return redirect()->to('gtareas-login');
    }

    public function datos_dispositivo(){
        $hostname = gethostname();
        $ip = request()->ip();
        $agente = request()->userAgent();
        $usersesion = $hostname . $ip . $agente;
        return $usersesion;
    }
}
