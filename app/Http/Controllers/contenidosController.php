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
//use \Validator;
use App\Promocion;

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
          return view('formularios.contenidos');
    }

    /* listamos las categorias
    * filtrando las que pertenecen
    * al negocio haciendo uso de la
    * sesion de usuario
    */
    public function listar()
    {
        //$categoria = app\Categoria::where('negocio', Auth::user()->negocio)->get();
        $categoria = app\Categoria::where('negocio', Auth::user()->user->negocio)->get();
        return response()->json($categoria->toArray());
   }


public function listar_promo()
{
    $promocion = app\Promocion::where('negocio_id', Auth::user()->user->negocio)->get();
        return response()->json(
           $promocion->toArray()
        );
}
   /* listamos los productos
   * filtrados por el id de la categoria
   */
   public function listar_producto($id)
    {
       $productos = App\Producto::join('categoria', 'producto.categoria', '=', 'categoria.codigo_categoria')
            ->where('categoria', $id)->
            get(array('nombre_producto', 'precio_producto', 'nombre_categoria'));
           return response()->json(
              $productos->toArray()
           );
    }

    /* Agregamos una categoria nueva
    * estos datos provienen de Ajax
    * #btnadd
    */
    public function addcate(Request $request)
    {
      //
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

    public function addpromocion(Request $request)
    {
        $datos= Request::all();
        $input= $datos['archivo'];
        //subimos el archivo
        $negocio = App\Negocio::find(Auth::user()->user->negocio);
        //subimos el archivo al servidor
        try {
            $extension = $input->getClientOriginalExtension();
            $input->move(base_path() .'/public/negocios/'.str_replace(' ', '',$negocio['nombre_negocio']).'/imgs'.'/',$datos['ruta_archivo']);
            $promocion= new app\Promocion();
            $promocion->activa=1;
            $promocion->nombre_promo=$datos['name'];
            $promocion->descripcion_promo=$datos['descrip'];
            $promocion->img_promo="../negocios/".str_replace(' ', '',$negocio['nombre_negocio'])."/imgs"."//".$datos['ruta_archivo'];
            $promocion->valido_desde=$datos['fecha_ini'];
            $promocion->valido_hasta=$datos['fecha_fin'];
            $promocion->negocio_id=$negocio['codigo_negocio'];
            $promocion->save();
            return  response()->json([
              "mensaje"=>"La nueva promoción ha agregada y se encuentra activa"
            ]);
        }
        catch (Exception $e) {
            return  response()->json([
              "mensaje"=>"No se pudo agregar la promoción intente de nuevo"
            ]);
        }


    }

    /* Obtenemos los el id de la promocion
    *  y retornamos sus elemntos para poder editarlos
    */
    public function getpromo($id)
    {
        $promocion = App\Promocion::find($id);
        return response()->json($promocion->toArray());
    }

    public function editpromo(Request $request, $id)
    {
        $updated_data = Request::all();
        $promocion = App\Promocion::find($id);
        $negocio = App\Negocio::find(Auth::user()->user->negocio)->nameConcatenated();

        try {

            // validamos que no se selecciono un nuevo volante

            if ( ! empty ($updated_data['archivo'])){
                $input = $updated_data['archivo'];
                $extension = $input->getClientOriginalExtension();
                $input->move(public_path() .'/negocios/'. $negocio .'/imgs'.'/',
                        $updated_data['updated_flyer']);

                $promocion->nombre_promo = $updated_data['name_updated'];
                $promocion->descripcion_promo = $updated_data['desc_updated'];
                $promocion->img_promo = "../negocios/". $negocio ."/imgs"."//".
                    $updated_data['updated_flyer'];
                $promocion->valido_hasta = $updated_data['enddate_updated'];
                $promocion->save();
                return response()->json([
                    "mensaje"=>"¡Se han guardado los cambios en la promoción!"
                ]);
            }
            else {
                $promocion->nombre_promo = $updated_data['name_updated'];
                $promocion->descripcion_promo = $updated_data['desc_updated'];
                $promocion->valido_hasta = $updated_data['enddate_updated'];
                $promocion->save();
                return response()->json([
                    "mensaje"=>"¡Se han guardado los cambios en la promoción pero el volante de la promoción no ha cambiado!"
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                "mensaje"=>"Ha ocurrido un error al modificar la promoción"
            ]);
        }
    }

    /* Agregamos nuevo productos
    *  los datos provienen de Ajax
    * #btnproducto
    */
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
        /*
         * $entrada=Request::file('openFile');
         * /busco el id del negocio que tiene el usuario
         * $negocio = App\Negocio::find(Auth::user()->negocio);
         * /subimos el archivo al servidor
         * $extension = $entrada->getClientOriginalExtension();
         * $entrada->move(base_path() .'/public/negocios/'.str_replace(' ', '',  * * $negocio['nombre_negocio']).'/','menu_'.str_replace(' ', '', $negocio['nombre_negocio']).'.'.$extension);

         * /actualizamos la ruta de acceso al menu
         * $negocio->menu_negocio='negocios/'.str_replace(' ', '', $negocio['nombre_negocio']).'/menu_'.str_replace(' ', '', $negocio['nombre_negocio']).'.'.$extension;
         * $negocio->save();
		 * return redirect('/mi_contenido');
         */
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
     * obtenemos el id de la categoria  a editar
     * y la categoria a editar
     * la enviamos a un Ajax
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
     * Actualizamos la categoria
     * los datos actualizados se obtienen via Ajax
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
        "mensaje"=>"Categoria actualizada"
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
