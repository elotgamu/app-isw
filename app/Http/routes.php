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
Route::get('/registro/confirmacion/{token}', 'addnegocioController@emailConfirm');

// aqui deseo filtar si el usuario esta activado
// en caso contrario no deberia poder loguearse
Route::get('/login', 'loginController@create');
Route::post('/login', 'loginController@store');

Route::get('/catalogo_negocios', 'listanegocioController@create');
Route::post('/catalogo_negocios','listanegocioController@store');
//Route::post('/catalogo_negocios', array('uses' => 'listanegocioController@prueba'));

// Panel de administarcion de perfiles
// lo restringimos para usuarios autenticados
Route::group(['middleware' => 'auth'], function(){
    Route::get('/mi_contenido','contenidosController@create');
    Route::post('/mi_contenido','contenidosController@store');
    Route::get('/logout', 'loginController@destroy');
});

// esta es una ruta de prueba
// solo muestra el esqueleto del sitio sin contenido
Route::get('/prueba', 'registroController@prueba');

// comentamos temporalmente
//Route::get('/cpanel', 'cpanelController@create');
//Route::get('/mi_contenido','contenidosController@create');
//Route::post('/mi_contenido','contenidosController@store');
//Route::get('/logout', 'loginController@destroy');
//Route::get('/{usuario}/micontendio','contenidosController@create');

/*Route::get('/{usuario}/micontendio', array('as' => 'user.cpanel', function($usuario){
    return view('formularios.contenidos');
}));*/
