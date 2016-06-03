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
Route::get('/catalogo_negocios/{id}','listanegocioController@vermenu');
//Route::post('/catalogo_negocios', array('uses' => 'listanegocioController@prueba'));

// Panel de administarcion de perfiles
// lo restringimos para usuarios autenticados
Route::group(['middleware' => 'auth'], function(){
    Route::get('/mi_contenido','contenidosController@create');
    //Route::post('/mi_contenido','contenidosController@store');
    Route::get('/logout', 'loginController@destroy');
    Route::post('/mi_contenido/categoria/agregar','contenidosController@addcate');
    Route::post('/mi_contenido/producto/agregar','contenidosController@addproducto');
    Route::get('/mi_contenido/listar','contenidosController@listar');
    Route::get('/mi_contenido/categoria/{id_categoria}/producto/listar','contenidosController@listar_producto');
    Route::get('/mi_contenido/Categorias/{id}/modificar','contenidosController@edit');
    Route::put('/mi_contenido/Categorias/{id}','contenidosController@update');
    Route::post('/mi_contenido/promocion/agregar','contenidosController@addpromocion');
    Route::get('/mi_contenido/promocion/listar','contenidosController@listar_promo');
    Route::get('/mi_contenido/promocion/{id}/modificar', 'contenidosController@getpromo');
    Route::post('/mi_contenido/promocion/{id}', 'contenidosController@editpromo');
});

// esta es una ruta de prueba
// solo muestra el esqueleto del sitio sin contenido
Route::get('/prueba', 'registroController@prueba');
// fin de definicion de rutas
