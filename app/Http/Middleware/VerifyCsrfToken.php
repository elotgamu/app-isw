<?php

namespace App\Http\Middleware;

use \Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except_urls = [
        //
       //'/mi_contenido/categoria/agregar',
       '/mi_contenido/menu/categoria/agregar',
       //'/mi_contenido/listar',
       '/mi_contenido/menu/categoria/listar',

       //'/mi_contenido/producto/agregar',
       '/mi_contenido/menu/producto/agregar',
       //'/mi_contenido/promocion/agregar',
       //agregado
       '/mi_contenido/promociones/agregar'
    ];


    /*esta funcion maneja la execpciones de $exept_urls*/
   public function handle($request, Closure $next)
   {
       $regex = '#' . implode('|', $this->except_urls) . '#';
      if ($this->isReading($request) || $this->tokensMatch($request) || preg_match($regex, $request->path()))
       {
         return $this->addCookieToResponse($request, $next($request));
      }
             throw new TokenMismatchException;
}

}
