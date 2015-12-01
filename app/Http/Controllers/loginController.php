<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App;
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
        //return Redirect()->route('test.route', ['usuario' =>  $userdata['name']]);
        return Redirect::to('/micontenido')->withInput();
        //echo 'SUCCESS!' . $userdata['name'];
    }
    else {
        // validation not successful, send back to form
        return Redirect('/login');
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
    public function destroy($id)
    {
        //
    }
}
