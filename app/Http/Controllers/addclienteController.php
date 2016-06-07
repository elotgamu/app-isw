<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App;
use App\User;
use \Validator, \Redirect;
use Hash;

class addclienteController extends Controller
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
        return view('formularios.registro_cliente');
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
        //obtenemos los datos ingresados
        $entrada= Request::all();

        // reglas de validacion
        $rules = [
            'txtnombres' => 'required|min:3',
            'txtapellidos' => 'required|min:3',
            'txtdireccion' => 'required|min:15',
            'txtemail' => 'required|unique:users,email',
            'txttelefono' => 'required|unique:clientes,telefono',
            'txtuser' => 'required|min:8',
            'txtpass' => 'required|min:8',
        ];

        $messages =[
            'required' => 'informacion requerida.',
            'min' => 'el campo debe tener almenos :min digitos.',
            'unique' => 'dato existente en la plataforma',
        ];

        $validator =  Validator::make($entrada, $rules, $messages);

        if ($validator->fails())
        {
            // It failed
          return  Redirect('/registro/cliente')->withErrors($validator)->withInput();
        }
        else {
          /* generamos el token de activacion del usuario*/
          $token = str_random(60);
          //creo las nuevas referencias a  admins
          $cliente = new App\Cliente;
          $cliente->nombres = $entrada['txtnombres'];
          $cliente->apellidos = $entrada['txtapellidos'];
          $cliente->telefono=$entrada['txttelefono'];
          $cliente->direccion =$entrada['txtdireccion'];
          $cliente->save();

          //obtengo la pk del admin para users
          $cliente_pk = $cliente->id;

          //ahora creamos el users relacionado al admin
          $user_cliente = new App\User;
          $user_cliente->name = $entrada['txtuser'];
          $user_cliente->email = $entrada['txtemail'];
          $user_cliente->password = Hash::make($entrada['txtpass']);
          $user_cliente->estado = false;
          $user_cliente->token= $token;
          $user_cliente->user_id = $cliente_pk;
          $user_cliente->user_type = 'App\Cliente';
          $user_cliente->save();

          // enviamos el email de confimacion basados en un vista
          Mail::send('emails.confirm_email', array('token' => $token, 'username' => $user_cliente->name), function ($message) use($user_cliente) {
              $message->to($user_cliente->email, $user_cliente->name)->subject('Activación de la cuenta Plataforma Gastronómica Publicitaria');
          });

          // redirigimos a home y avisamos que revise su correo
          return redirect('/')->with('mensaje', '¡Registro exitoso!,revise su correo y siga las intrucciones para poder usar su cuenta');
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
