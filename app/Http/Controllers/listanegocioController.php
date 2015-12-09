<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class listanegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listanegocio = App\Negocio::paginate(10);
        return View('formularios.catalogonegocio')->with('lista',$listanegocio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $entrada= Request::all();
        if(!isset($entrada['busqueda']))
        {
            return  redirect('/catalogo_negocios');
        }
        else
        {
          $listanegocio=app\Negocio::where('nombre_negocio', 'LIKE', '%'.$entrada['busqueda'].'%')->get();
          return View('formularios.catalogonegocio',array('lista' => $listanegocio, 'busqueda'=>$entrada['busqueda']));
        }
    }

    public function buscar($coincidencia)
    {
      //dd($coincidencia);
      if (!isset($coincidencia))
      {
        //return redirect('/catalogo_negocios');
        dd("no ha buscado nada");
      }
      else
      {
        $listanegocio=app\Negocio::where('nombre_negocio', 'LIKE', '%'.$coincidencia.'%')->get();
        return  View('formularios.catalogonegocio',array('lista' => $listanegocio, 'busqueda'=>$coincidencia));
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
      $entrada = Request::all();
      $negocio = App\Negocio::where('codigo_negocio', $entrada['codigo_negocio'])->get(['descipcion_negocio']);
      //return view('formularios.detalles_negocio', array('negocio' => $negocio, 'codigo_negocio' => $entrada['codigo_negocio']));
      dd($entrada);
      //$negocio =App\Negocio::where('nombre_negocio', $id)->get(['descipcion_negocio']);
      //dd($negocio);
    }

    public function prueba(Request $request)
    {
      //$entrada = Request::all();

      if (Request::get('detalles'))
      {
        $entrada = Request::Input('id_negocio');
        dd($entrada);
        //dd($entrada['id_negocio']);
      //  $id = $entrada[lista];
        //$this->show($id);
      }
      elseif (Request::get('buscar'))
      {
        $entrada = Request::Input('busqueda');
        //dd($entrada['busqueda']);
        //dd($entrada);
        $this->buscar($entrada);
      }
      else
      {
        dd("que pasó");
      }
      //$negocio = app\Negocio::where('nombre_negocio', $dts_negocio)->get(['descipcion_negocio']);
      //return View('formularios.detalles_negocio', array('negocio' => $negocio, 'nombre_negocio'=>$dts_negocio));
      //return dd($negocio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
