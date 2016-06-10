<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                // modificado el path de login
                return redirect()->guest('/login')->with('mensaje', 'Primero debe iniciar sesión');
                //return redirect()->guest('auth/login');
            }
        } else {
            return $next($request);
        }

        //esto es una prueba comento
        // verifico si ya el usuario esta activo(confirmado)
        /*if ( ! $this->auth->user()->isActivated() ) {
            return redirect()->guest('/login')->with('mensaje', 'Lo sentimos, su cuenta no ha sido activada aún');
        }else {
            return $next($request);
        }*/
    }
}
