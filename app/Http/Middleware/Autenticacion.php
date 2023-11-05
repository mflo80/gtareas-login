<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
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

        if(Cache::has($token)){
            $usuario = Cache::get($token);

            $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get(getenv('GTOAUTH_AUTENTICADO'));

            if($response->getStatusCode() == 200){
                Cache::put($token , $usuario, getenv('SESSION_LIFETIME'));
                return $next($request);
            }
        }

        return redirect()->route('auth.login');
    }
}
