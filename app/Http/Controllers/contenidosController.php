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
          //$negocio = App\Negocio::find(Auth::user()->negocio);
          //cargamos las categorias del menu.
          //$categorias= App\Categoria:: find(Auth::user->)
          return view('formularios.contenidos');
          //->with('ruta_menu', 'http://isw.cloudapp.net/pdfjs/web/viewer.html?File=http://isw.cloudapp.net/'.$negocio['menu_negocio']);
    }

    public function listar()
    {
       $categoria= app\Categoria::all();
           return response()->json(
              $categoria->toArray()
           );
    }
    
    public function listar_producto($id)
    {
       $productos= app\Producto::where('categoria',$id)->get();
           return response()->json(
              $productos->toArray()
           );
    }

    public function addcate(Request $request)
    {
      //
      $data = Request::all();
      $categorias= new app\Categoria();
      $categorias->nombre_categoria=$data['name'];
      $categorias->descripcion_categoria=$data['descrip'];
      $categorias->save();      
      return  response()->json([
        "mensaje"=>"Categoria agregada"
      ]);
    }
    
    public function addproducto(Request $request)
    {
      //
      $data = Request::all();
      $productos= new app\Producto();
      $productos->nombre_producto=$data['name'];
      $productos->precio_producto=$data['precio'];
      $productos->categoria=$data['id_catego'];
      $productos->save();      
      return  response()->json([
        "mensaje"=>"producto agregado"
      ]);
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
        //$entrada=Request::file('openFile');
        //busco el id del negocio que tiene el usuario
        //$negocio = App\Negocio::find(Auth::user()->negocio);
        //subimos el archivo al servidor
        //$extension = $entrada->getClientOriginalExtension();
        //$entrada->move(base_path() .'/public/negocios/'.str_replace(' ', '', $negocio['nombre_negocio']).'/','menu_'.str_replace(' ', '', $negocio['nombre_negocio']).'.'.$extension);

        //actualizamos la ruta de acceso al menu
      //$negocio->menu_negocio='negocios/'.str_replace(' ', '', $negocio['nombre_negocio']).'/menu_'.str_replace(' ', '', $negocio['nombre_negocio']).'.'.$extension;
      //$negocio->save();
		  //return redirect('/mi_contenido');
      if($request->ajax())
      {
      return  response()->json([
        "mensaje"=>"prueba de repuesta"
      ]);
      }
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
        $categoria=App\Categoria::find($id);
         return response()->json(
              $categoria->toArray()
           );
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
        $data = Request::all();
        $categoria= App\Categoria::find($id);
        $categoria->nombre_categoria= $data['name'];
        $categoria->descripcion_categoria=$data['descrip'];
        $categoria->save();
        return  response()->json([
        "mensaje"=>"Categoria Actualizada"
        ]);
        
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
