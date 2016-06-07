<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App;

use App\Http\Middleware\Authenticate;
use Session;
use \Validator, \Redirect;

class loginController extends Controller
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
        /*al cargar la vista obtenemos la dirección */
        return View('formularios.login')->with('mensaje','');
    }

    public function mensaje()
    {
        //
        return View('formularios.login')->with('mensaje','El registro fue completado te invitamos a Iniciar sesion');
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
        $input= Request::all();
        $rules = [
            'txtnuser' => 'required',
            'txtpassword' => 'required|min:8',
        ];

        $messages =[
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
            'unique' => 'Ya existe un negocio con ese nombre en la plataforma',
        ];

        $validator =  Validator::make($input, $rules);

        if ($validator->fails())
        {
            // It failed
          return  Redirect('/login')->withErrors($validator->messages())->withInput();
        }
        else
        {
          $userdata = array(
          'name'=> $input['txtnuser'],
          'password'  => $input['txtpassword'],
          );
          // attempt to do the login
    if (Auth::attempt($userdata)) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        //return Redirect()->route('/{usuario}/micontendio', ['usuario' =>  $userdata['name']]);

        //comento ya que ahora se manejan 2 tipos de usuarios
        //return Redirect::to('/mi_contenido');
        //obtenemos el tipo de usuario
        if(Auth::user()->user_type =='App\Admin')
        {
            return Redirect::to('/mi_contenido');
        }
        else if(Auth::user()->user_type =='App\Cliente')
        {
            //echo "Usuario cliente";
            return redirect('/')->with('mensaje', '¡Ha iniciado sesión como cliente en nuestra plataforma!');
        }
        else
        {
            echo Auth::user()->user_type;
        }
        //echo 'SUCCESS!' . $userdata['name'];
    }
    else {
        // validation not successful, send back to form
        return Redirect('/login')->with('mensaje', '¡Los datos de usuario o contraseña son inválidos!');
      }
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
    public function destroy()
    {
        // aqui sacamos al usuario de su sesion
        Auth::logout();
        return Redirect::to('/')->with('mensaje', 'Ha cerrado su sesión correctamente');
    }
}
