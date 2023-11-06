<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class Autenticacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->session()->get('gtoken');

        if ($token) {
            if(Cache::has($token)){
                return $next($request);
            }

            $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                ->get(getenv('GTOAUTH_AUTENTICADO'));

            $valores = $response->json();

            if($response->getStatusCode() == 200){
                $usuario = $valores['usuario'];
                Cache::put($token , $usuario, Carbon::now()->addMinutes(getenv('SESSION_LIFETIME')));
                return $next($request);
            }

            if($response->getStatusCode() == 401){
                return redirect()->route('auth.login')->withErrors([
                    'message' => 'Se ha vencido la sesión.'
                ], 403);
            }
        }

        return redirect()->route('auth.login')->withErrors([
            'message' => 'No se encuentra autenticado.'
        ], 403);
    }
}
