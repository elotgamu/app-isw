<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfNotMailActivated
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
        //este middleware no se usa
        //da error al evaluar la funcion isActivated en el usuario
        //que desea iniciar sesion
        if ( ! $this->auth->user()->isActivated()) {
            return redirect('/login')
                ->with('mensaje',
                       '¡Lo sentimos, no ha confirmado su cuenta aún!');
        } else {
            return $next($request);
        }
    }
}
