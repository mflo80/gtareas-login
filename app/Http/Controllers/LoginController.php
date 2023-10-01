<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
            'password' => 'required',
        ]);

        $response = Http::post(env('SERVER_GTOAUTH').'/api/auth/login', $datos);

        if($response->getStatusCode() == 200 && Auth::attempt($datos)){
            $request->session()->regenerate();
            return redirect()->to('gtareas-inicio');
        }

        if($response->getStatusCode() == 401){
            return back()->withErrors([
                'message' => 'Correo electrónico y/o contraseña incorrectos, intente de nuevo por favor...',
            ])->onlyInput('email');
        }
	}

    public function logout(Request $request)
    {
        if( ! Auth::check() ) {
            return redirect()->to('gtareas-login');
        }

        $token = Auth()->user()->token;
        $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                            ->get(env('SERVER_GTOAUTH').'/api/auth/logout');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('gtareas-login');
    }
}
