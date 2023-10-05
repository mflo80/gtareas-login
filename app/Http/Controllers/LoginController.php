<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $hostname = gethostname();

        if(isset($_COOKIE[$hostname])){
            if(Cache::get(gethostname())){
                $datos = Cache::get(gethostname());
                return view('gtareas-login', ['datos' => $datos]);
            }
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

        $remember = $request->has('remember');

        if($response->getStatusCode() == 200 && Auth::attempt($credenciales)){
            request()->session()->regenerate();

            $hostname = gethostname();

            if(isset($remember)){
                if($remember){
                    setcookie($hostname, "login-true", time() + (86400 * 30), "/");
                    Cache::set($hostname, [$credenciales['email'], $credenciales['password'], true], 3600);
                } else {
                    unset($_COOKIE[$hostname]);
                    Cache::delete($hostname);
                }
            }

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

        Auth::logout();
        $request->session()->invalidate();

        if($response->getStatusCode() >= 200){
            return redirect()->to('gtareas-login')->withErrors([
                'message' => $valores['message'],
            ]);
        }

        return redirect()->to('gtareas-login');
    }
}
