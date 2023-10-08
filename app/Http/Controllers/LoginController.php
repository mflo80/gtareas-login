<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index(){
        if(auth()->check()) {
            return redirect()->to('gtareas-inicio');
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

			$datosCliente = (new DatosClienteController)->datos_token();
			$token = $valores['token'];
            Cache::set($datosCliente, $token, 60*6);

            return redirect()->route('gtareas-inicio')->withErrors([
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
        $datosCliente = (new DatosClienteController)->datos_token();
        if(Cache::get($datosCliente)){
            $token = Cache::get($datosCliente);
        }

        if(isset($token)){
            $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get(env('GTOAUTH_LOGOUT'));

            $valores = json_decode($response->body(), true);

            if(Cache::get($datosCliente)){
                Cache::delete($datosCliente);
            }
        }

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
}
