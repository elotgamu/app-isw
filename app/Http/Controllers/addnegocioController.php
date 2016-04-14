<?php

namespace App\Http\Controllers;

/*use Illuminate\Http\Request;*/
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App;
use App\User;
use \Validator, \Redirect;
use Hash;
use File;

use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        //obtenemos los datos ingresados
        $entrada= Request::all();

        // reglas de validacion
        $rules = [
            'nombre' => 'required|unique:negocio,nombre_negocio|min:5',
            'direccion' => 'required|min:15',
            'propietario' => 'required|min:15',
            'correo' => 'required|unique:users,email',
            'usuario' => 'required|unique:users,name|min:5',
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

          /*guardamos los datos del negocio*/
          $nego = new app\Negocio;
          $nego->nombre_negocio= $entrada['nombre'];
          $nego->descipcion_negocio= $entrada['descripcion'];
          $nego->ubicacion_negocio= $entrada['direccion'];
          $nego->propietario_negocio= $entrada['propietario'];
          $nego->telefono_negocio= $entrada['telefono'];
          $nego->menu_negocio='';
          $nego->save();

          /*luego obtenemos el id del ultimo negocio guardado*/
          $last_nego = $nego->codigo_negocio;

          /* generamos el token de activacion del usuario*/
          $token = str_random(60);

          /*Guardamos los datos del usuario*/
          $user_nego = new App\User;
          $user_nego->name= $entrada['usuario'];
          $user_nego->email= $entrada['correo'];
          $user_nego->password = Hash::make($entrada['contraseña']);
          $user_nego->estado= false;
          $user_nego->negocio= $last_nego;
          $user_nego->rol= 1;
          $user_nego->token= $token;
          $user_nego->save();

          // enviamos el email de confimacion basados en un vista
          Mail::send('emails.confirm_email', array('token' => $token, 'username' => $user_nego->name), function ($message) use($user_nego) {
              $message->to($user_nego->email, $user_nego->name)->subject('Activación de la cuenta Plataforma Gastronómica Publicitaria');
          });

          // redirigimos a home y avisamos que revise su correo
          return redirect('/')->with('mensaje', '¡Registro exitoso!,revise su correo y siga las intrucciones para poder usar su cuenta');
        }
    }

    // activamos al usuario
    public function emailConfirm($token)
    {
        try {
            //primeros buscamos al negocio que tenga el usuario del token
            //y asi le creamos la carpeta del negocio
            $negocio = App\Negocio::whereHas('user', function ($query) use($token) {
                $query->where('token', $token);
            })->firstOrFail()->folderProfile();

            //Ahora activamos al usuario
            $user = User::whereToken($token)->firstOrFail()->confirmEmail();
            return redirect('/login')->with('mensaje', '¡Su cuenta de usuario se ha activado, ahora puede iniciar sesión en su cuenta!');

        } catch (ModelNotFoundException $e) {
            return redirect('/login')->with('mensaje', 'Ya se ha confirmado a este usuario, solo inicie sesión ¬¬');
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
