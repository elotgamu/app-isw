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
use \Validator;

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

    public function getnego()
    {
        $negocio = app\Negocio::find(Auth::user()->user->negocio);
        return response()->json($negocio->toArray());
    }

    public function infotoedit()
    {
        $negocio = app\Negocio::where('codigo_negocio', Auth::user()->user->negocio)->get(array('descipcion_negocio', 'ubicacion_negocio', 'email_negocio', 'telefono_negocio'));
        return response()->json($negocio->toArray());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function nego_updated(Request $request)
    {
        $updated_data = Request::all();
        $rules = array(
            'details' => 'required',
            'location' => 'required',
            'email_negocio' => 'required|unique:negocio,email_negocio',
            'telephone' => 'required|numeric'
        );
        $validator = Validator::make($updated_data, $rules);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(array('errors' => $messages));
        } else {
            $negocio = app\Negocio::find(Auth::user()->user->negocio);
            $negocio->descipcion_negocio = $updated_data['details'];
            $negocio->ubicacion_negocio = $updated_data['location'];
            $negocio->email_negocio = $updated_data['email_negocio'];
            $negocio->telefono_negocio = $updated_data['telephone'];
            $negocio->save();
            return response()->json(["mensaje"=>"Datos del negocio actualizados"]);
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
}
