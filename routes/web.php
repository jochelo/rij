<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contactos', function () {
    return view('contactos');
});
Route::get('/galeria', function () {
    $mallas=\App\Malla::get();
    $alambres=\App\Alambre::get();
    return view('galeria',compact('mallas','alambres'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/alambres','AlambreController');
Route::resource('/clientes','ClienteController');
Route::resource('/mallas','MallaController');
Route::resource('/ordenAlambres','OrdenAlambreController');
Route::resource('/ordenMallas','OrdenMallaController');
Route::resource('/pedidos','PedidoController');
Route::resource('/reservas','ReservaController');

Route::post('/reservas/updateP/{id}','ReservaController@updateP')->name('reservas.updateP');

Route::get('/inicio','PedidoController@inicio')->name('inicio');
Route::get('/pedidos/{id}/crear','PedidoController@crear')->name('crear');
Route::get('/ordenMalla/{pedido_id}/{malla_id}','PedidoController@ordenMalla')->name('ordenMalla');
Route::get('/ordenAlambre/{pedido_id}/{alambre_id}','PedidoController@ordenAlambre')->name('ordenAlambre');
Route::get('/pedidos/{id}/ordenes','PedidoController@ordenes')->name('ordenes');

Route::resource('/users','UserController');
Route::resource('/cotizadors','CotizadorController');
Route::post('/cotizadors/malla','CotizadorController@cMalla')->name('cMalla');
Route::post('/cotizadors/alambre','CotizadorController@cAlambre')->name('cAlambre');

Route::get('/reporte/inicioG','ReporteController@inicioG')->name('inicioG');
Route::post('/reporte/storeG','ReporteController@storeG')->name('storeG');

Route::get('/reporte/inicioR','ReporteController@inicioR')->name('inicioR');
Route::post('/reporte/storeR','ReporteController@storeR')->name('storeR');

Route::get('/reporte/storeRep/{fei}/{fef}','ReporteController@storeRep')->name('storeRep');

//Rutas para imprimir reportes

Route::get('/reporte/clientePot/{fei}/{fef}','ReporteController@clientePot')->name('clientePot');
Route::get('/reporte/clienteTime/','ReporteController@clienteTime')->name('clienteTime');
Route::get('/reporte/ingresoCli/{fei}/{fef}','ReporteController@ingresoCli')->name('ingresoCli');