<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->user_type != 'App\Admin')
        {
            return redirect('/')->with('mensaje', 'La ruta que pidió solo es disponible para los dueños de negocios');;
        }
        return $next($request);
    }
}
