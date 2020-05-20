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

    Route::get('Registro_frac','AdministradorController@Registro_de_fracionamientos');
    Route::get('recupear_pais','AdministradorController@Recuperarpais_ajax');
    Route::get('recuperar_estados/{id}','AdministradorController@RecuperarEstado');
    Route::get('recuperar_municipios/{id}','AdministradorController@RecuperandoMunicipios');
});


// Rutas para iniciar sesión
Auth::routes(['verify'=>true]);




