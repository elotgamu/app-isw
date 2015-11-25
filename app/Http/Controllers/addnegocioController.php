<?php

namespace App\Http\Controllers;

/*use Illuminate\Http\Request;*/

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App;
use \Validator, \Redirect;
use Hash;

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
            'nombre' => 'required|unique:negocio,nombre_negocio|min:5',
            'direccion' => 'required|min:15',
            'propietario' => 'required|min:15',
            'correo' => 'required|unique:user,email',
            'usuario' => 'required|unique:user,name|min:5',
            'contraseña' => 'required|min:8',
        ];

        $messages =[
            'required' => ':attribute obligatorio.',
            'min' => ':attribute debe tener almenos :min digitos.',
            'unique' => ':attribute existente en la plataforma',
        ];

        $validator =  Validator::make($entrada, $rules, $messages);

        if ($validator->fails())
        {
            // It failed
          return  Redirect('/registro')->withErrors($validator)->withInput();
        }
        else {
          # code...
          /*guardamos los datos del negocio*/
          $nego = new app\Negocio;
          $nego->nombre_negocio= $entrada['nombre del negocio'];
          $nego->descipcion_negocio= $entrada['descripcion'];
          $nego->ubicacion_negocio= $entrada['txtdireccion'];
          $nego->propietario_negocio= $entrada['txtpropietario'];
          $nego->email_negocio= $entrada['email'];
          $nego->telefono_negocio= $entrada['txttelefono'];
          $nego->save();

          /*luego obtenemos el id del ultimo negocio guardado*/
          $last_nego = $nego->codigo_negocio;
          /*Guardamos los datos del usuario*/
          $user_nego = new App\User;
          $user_nego->name= $entrada['txtuser'];
          $user_nego->email= $entrada['email'];
          $user_nego->password = Hash::make($entrada['txtpass']);
          $user_nego->estado= false;
          $user_nego->negocio= $last_nego;
          $user_nego->rol= 1;
          $user_nego->save();
          /*si todo queda bien redireccionamos a la misma pagina*/
          //
          return  redirect('/login')->with('mensaje','prueba')->withInput();
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
