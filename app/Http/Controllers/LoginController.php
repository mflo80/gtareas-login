<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    public function index(){
        if( auth()->check() ) {
            return redirect()->to('gtareas-inicio');
        }

        return view('gtareas-login');
    }

    public function login(Request $request)
    {
        $datos = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ], [
            'email.required' => 'Debe ingresar el correo electrónico.',
            'password.required' => 'Debe ingresar la contraseña.'
        ]);

        $response = Http::withHeaders([ "Accept" => "application/json"])
            -> post(getenv("GTOAUTH_LOGIN"), $datos);

        $valores = json_decode($response->body(), true);

        if($response->getStatusCode() == 200 && Auth::attempt($datos)){
            $request->session()->regenerate();
            $token = $valores['token'];
            $request->session()->put('access_token', $token);
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
        if(!Auth::check() ) {
            return redirect()->to('gtareas-login');
        }

        $token = $request->session()->get('access_token');
        $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                    ->get(env('GTOAUTH_LOGOUT'));

        $valores = json_decode($response->body(), true);


        if(is_null($valores)){
            Auth::logout();
            return redirect()->to('gtareas-login');
        }

        if($response->getStatusCode() >= 200){
            Auth::logout();
            return redirect()->to('gtareas-login')->withErrors([
                'message' => $valores['message'],
            ]);
        }

        return redirect()->to('gtareas-login');
    }
}
