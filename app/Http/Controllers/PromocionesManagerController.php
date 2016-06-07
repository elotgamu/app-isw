<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fileentry;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Auth;
use App;
use App\Promocion;

class PromocionesManagerController extends Controller
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
        return view('formularios.contenidos_promociones');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos= Request::all();
        $input= $datos['archivo'];
        //subimos el archivo
        $nombre_negocio = App\Negocio::find(Auth::user()->user->negocio)->nameConcatenated();
        $negocio = App\Negocio::find(Auth::user()->user->negocio);
        //subimos el archivo al servidor
        try {
            $extension = $input->getClientOriginalExtension();
            $input->move(public_path() .'/negocios/'. $nombre_negocio .'/imgs'.'/',$datos['ruta_archivo']);
            $promocion= new app\Promocion();
            $promocion->activa=1;
            $promocion->nombre_promo=$datos['name'];
            $promocion->descripcion_promo=$datos['descrip'];
            $promocion->img_promo="../negocios/". $nombre_negocio ."/imgs"."//".$datos['ruta_archivo'];
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
        $promocion = App\Promocion::find($id);
        return response()->json($promocion->toArray());
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

    // mis funciones
    public function listar_promo()
    {
        $promocion = app\Promocion::where('negocio_id', Auth::user()->user->negocio)->get();
            return response()->json(
               $promocion->toArray()
            );
    }
}
