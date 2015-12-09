<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fileentry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Auth;
use App;

class contenidosController extends Controller
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
          $negocio = App\Negocio::find(Auth::user()->negocio);
          return view('formularios.contenidos')->with('ruta_menu', 'http://isw.cloudapp.net/pdfjs/web/viewer.html?File=http://isw.cloudapp.net/'.$negocio['menu_negocio']);
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
        $entrada=Request::file('openFile');
        //busco el id del negocio que tiene el usuario
        $negocio = App\Negocio::find(Auth::user()->negocio);
        //subimos el archivo al servidor
        $extension = $entrada->getClientOriginalExtension();
        $entrada->move(base_path() .'/public/negocios/'.str_replace(' ', '', $negocio['nombre_negocio']).'/','menu_'.str_replace(' ', '', $negocio['nombre_negocio']).'.'.$extension);

        //actualizamos la ruta de acceso al menu
      $negocio->menu_negocio='negocios/'.str_replace(' ', '', $negocio['nombre_negocio']).'/menu_'.str_replace(' ', '', $negocio['nombre_negocio']).'.'.$extension;
      $negocio->save();
		  return redirect('/mi_contenido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
