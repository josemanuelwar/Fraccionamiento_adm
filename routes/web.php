<?php

use Illuminate\Support\Facades\Route;

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



Route::middleware(['auth','verified'])->group(function (){
    Route::get('/', 'AdministradorController@principal');
    Route::get('principal', ['as' => 'principal', 'uses' => 'AdministradorController@principal' ]);

    /** rutas josemauel */
    Route::get('Registro_frac','AdministradorController@Registro_de_fracionamientos');
    Route::get('recupear_pais','AdministradorController@Recuperarpais_ajax');
    Route::get('recuperar_estados/{id}','AdministradorController@RecuperarEstado');
    Route::get('recuperar_municipios/{id}','AdministradorController@RecuperandoMunicipios');
    /**Alta a lo pasis y estados */
    Route::get('Agregar_region','SuperAdminController@index');
    Route::post('/agregarpais','SuperAdminController@Guardar_pais_ajax');
    Route::get('GetPais/{id}','SuperAdminController@GetPais')->name('getpaises');
    Route::put('/actualizarpais/{id}','SuperAdminController@actualizarpais')->name('actualizar');
    Route::delete('eliminarpais/{id}','SuperAdminController@Eliminarpais')->name('Eliminar');
    /**gragar estados */
    Route::get('EstadosView','SuperAdminController@EstadosView')->name('Estado');
    Route::post('GuardarEstado','SuperAdminController@GuardarEstado')->name('gurdarEstados');
    Route::get('GetEstado/{id}','SuperAdminController@GetEstado')->name('getEstado');
    Route::put('updateEstado/{id}','SuperAdminController@updateEstado')->name('updateEstado');
    Route::delete('deleEstado/{id}','SuperAdminController@deleEstado')->name('deleEstado');



});

// Rutas para iniciar sesión
Auth::routes(['verify'=>true]);




// ******** //// ********************////////////////
// RUTAS DE EDUARDO CERVANTES
