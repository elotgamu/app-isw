<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'negocioController@create');
Route::get('/home','negocioController@create');
Route::get('/registro','addnegocioController@create');
Route::post('/registro','addnegocioController@store');
Route::get('/prueba', 'registroController@prueba');
Route::get('/login', 'loginController@create');
Route::post('/login', 'loginController@store');
Route::get('/catalogo_negocios', 'listanegocioController@create');
//Route::get('/login/{mensaje}','loginController@bienvenido');

/*Route::get('login/{mensaje}', function($mensaje){
	 return view('formularios.login')->with('mensaje',$mensaje);
});*/

/*Route::get('/', function () {
    //return view('welcome');
    return view('formularios.registro_negocio');
});*/

/*Route::get('/test', function() {
    //return "Aqui no hay nada bueno";
    return view('formularios.registro_negocio');
});*/
