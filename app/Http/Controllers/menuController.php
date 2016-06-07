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

class menuController extends Controller
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
        return view('formularios.contenidos_menu');
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

    //en lugar de usar lo de arriba creo mis funciones

    //lo de categorias

    public function addcategoria(Request $request)
    {
        $data = Request::all();
        $negocio = Auth::user()->user->negocio;
        $categorias= new app\Categoria();
        $categorias->nombre_categoria=$data['name'];
        $categorias->descripcion_categoria=$data['descrip'];
        $categorias->negocio = $negocio;
        //$categorias->negocio=$data['nego'];
        $categorias->save();
        return  response()->json([
          "mensaje"=>"Categoria agregada"
        ]);
    }

    //obtengo las categorias del negocio y las retorno en Json
    public function listscategoria()
    {
        $categoria = app\Categoria::where('negocio', Auth::user()->user->negocio)->get();
        return response()->json($categoria->toArray());
    }

    public function getcategoria($id)
    {
        $categoria=App\Categoria::find($id);
         return response()->json($categoria->toArray());
    }

    public function updatecategoria(Request $request, $id)
    {
        $data = Request::all();
        $categoria= App\Categoria::find($id);
        $categoria->nombre_categoria= $data['name'];
        $categoria->descripcion_categoria=$data['descrip'];
        $categoria->save();
        return  response()->json([
        "mensaje"=>"Categoria actualizada"
        ]);
    }

    public function addproducto(Request $request)
    {
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

    public function listarproductos($id)
    {
        $productos = App\Producto::join('categoria', 'producto.categoria', '=', 'categoria.codigo_categoria')
             ->where('categoria', $id)->
             get(array('nombre_producto', 'precio_producto', 'nombre_categoria'));
            return response()->json(
               $productos->toArray()
            );
    }
}
