<?php

namespace App\Http\Controllers;

/*use Illuminate\Http\Request;*/

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App;
use \Validator, \Redirect;

class addnegocioController extends Controller
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
        return view('formularios.addnegocio');
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

        $rules = [
            'txtnegocio' => 'required',
            'txtdireccion' => 'required',
            'txtpropietario' => 'required',
            'txtuser' => 'required',
            'txtpass' => 'required',
            'txtpass' => 'required|min:8',
        ];

        $messages =[
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
            'unique' => 'Ya existe un negocio con ese nombre en la plataforma',
        ];

        $validator =  Validator::make($entrada, $rules);

        if ($validator->fails())
        {
            // It failed
          return  Redirect('/registro')->withErrors($validator->messages())->withInput();
        }
        else {
          # code...
          /*guardamos los datos del negocio*/
          $nego = new app\Negocio;
          $nego->nombre_negocio= $entrada['txtnegocio'];
          $nego->descipcion_negocio= $entrada['txtdescripcion'];
          $nego->ubicacion_negocio= $entrada['txtdireccion'];
          $nego->propietario_negocio= $entrada['txtpropietario'];
          $nego->email_negocio= $entrada['email'];
          $nego->telefono_negocio= $entrada['txttelefono'];
          $nego->save();

          /*luego obtenemos el id del ultimo negocio guardado*/
          $last_nego = $nego->codigo_negocio;
          /*Guardamos los datos del usuario*/
          $user_nego = new App\Usuario;
          $user_nego->nombre_usuario= $entrada['txtuser'];
          $user_nego->passwd= $entrada['txtpass'];
          $user_nego->estado= false;
          $user_nego->negocio= $last_nego;
          $user_nego->rol= 1;
          $user_nego->save();
          /*si todo queda bien redireccionamos a la misma pagina*/
          $mensaje="Ya eres parte de la plataforma te invitamos a loguearte";
            return  Redirect('/Home')->with('mensaje', $mensaje);
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
