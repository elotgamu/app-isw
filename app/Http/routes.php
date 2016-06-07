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
Route::get('/registro/cliente','addclienteController@create');
Route::post('/registro/cliente','addclienteController@store');
Route::get('/registro/confirmacion/{token}', 'addnegocioController@emailConfirm');

// aqui deseo filtar si el usuario esta activado
// en caso contrario no deberia poder loguearse
Route::get('/login', 'loginController@create');
Route::post('/login', 'loginController@store');
Route::get('/logout', 'loginController@destroy');

Route::get('/catalogo_negocios', 'listanegocioController@create');
Route::post('/catalogo_negocios','listanegocioController@store');
Route::get('/catalogo_negocios/{id}','listanegocioController@vermenu');
//Route::post('/catalogo_negocios', array('uses' => 'listanegocioController@prueba'));

// Panel de administarcion de perfiles
// lo restringimos para usuarios autenticados
Route::group(['middleware' => ['auth', 'App\Http\Middleware\AdminMiddleware']], function(){
    Route::get('/mi_contenido','contenidosController@create');
    //Route::get('/logout', 'loginController@destroy');

    //datos del negocio
    Route::get('/mi_contenido/detalles','contenidosController@getnego');

    //manejo del menu(categorias y productos)
    Route::get('/mi_contenido/menu','menuController@create');
    Route::get('/mi_contenido/menu/categoria/listar','menuController@listscategoria');
    Route::post('/mi_contenido/menu/categoria/agregar','menuController@addcategoria');
    Route::get('/mi_contenido/menu/categoria/{id}/modificar','menuController@getcategoria');
    Route::put('/mi_contenido/menu/categoria/{id}','menuController@updatecategoria');
    Route::post('/mi_contenido/menu/producto/agregar','menuController@addproducto');
    Route::get('/mi_contenido/menu/producto/{id}/listar','menuController@listarproductos');

    //manejo de las promociones
    Route::get('/mi_contenido/promociones', 'PromocionesManagerController@create');
    Route::get('/mi_contenido/promociones/listar', 'PromocionesManagerController@listar_promo');
    Route::post('/mi_contenido/promociones/agregar','PromocionesManagerController@store');
    Route::get('/mi_contenido/promociones/{id}/modificar', 'PromocionesManagerController@edit');
    Route::post('/mi_contenido/promociones/{id}','PromocionesManagerController@update');
});

// esta es una ruta de prueba
// solo muestra el esqueleto del sitio sin contenido
Route::get('/prueba', 'registroController@prueba');
// fin de definicion de rutas
