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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', ['as' => 'Login', 'uses' => 'LoginController@Index' ]);
Route::get('principal', ['as' => 'principal', 'uses' => 'AdministradorController@principal' ]);
// ruta para iniciar sesion
Route::post('IniciasSession', 'LoginController@show');

Route::get('Registro_frac','AdministradorController@Registro_de_fracionamientos');
Route::get('recupear_pais','AdministradorController@Recuperarpais_ajax');
Route::get('recuperar_estados/{id}','AdministradorController@RecuperarEstado');
Route::get('recuperar_municipios/{id}','AdministradorController@RecuperandoMunicipios');

Route::get('Agregar_region','SuperAdminController@index');
Route::post('agregarpais','SuperAdminController@Guardar_pais_ajax');
Route::get('GetPais/{id}','SuperAdminController@GetPais')->name('getpaises');
Route::put('actualizarpais/{id}','SuperAdminController@actualizarpais')->name('actualizar');
Route::delete('eliminarpais/{id}','SuperAdminController@Eliminarpais')->name('Eliminar');
/**gragar estados */
Route::get('EstadosView','SuperAdminController@EstadosView')->name('Estado');
Route::post('GuardarEstado','SuperAdminController@GuardarEstado')->name('gurdarEstados');


Route::middleware(['auth','verified'])->group(function (){
    Route::get('/', 'AdministradorController@principal');
    Route::get('principal', ['as' => 'principal', 'uses' => 'AdministradorController@principal' ]);

    /** rutas josemauel */
    Route::get('Registro_frac','AdministradorController@Registro_de_fracionamientos');
    Route::post('Agragar_fracionamientos','AdministradorController@AgregarFracionamiento')->name("registro");
    Route::get('Editar_fracionamiento/{id}','AdministradorController@Editar_fracionamiento')->name("editarfraccionaminto");
    Route::post('/actulizar','AdministradorController@Actulizarfarcionamiento')->name('actualizar');
    Route::get('/eliminar/{id}','AdministradorController@eliminarfracionamiento')->name('Eliminara');
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
// vista para los municipios
Route::get('AgegarMunicipios','SuperAdminController@AgegarMunicipios')->name('AgegarMunicipios');
//traer por ajax todos los estados
Route::post('TraerEstados','SuperAdminController@TraerEstados')->name('TraerEstados');
//ruta para guardar los municipios
Route::post('GuardarMunicipio', 'SuperAdminController@GuardarMunicipio')->name('GuardarMunicipio');
//mostrar los municipios en la vista
Route::post('TraerMunicipios', 'SuperAdminController@TraerMunicipios')->name('TraerMunicipios');
//Traer los municipios para el modal 
Route::post('MunicipioGet', 'SuperAdminController@MunicipioGet')->name('MunicipioGet');
//actualizar el municipio
Route::post('ActualizarMunicipio', 'SuperAdminController@ActualizarMunicipio')->name('ActualizarMunicipio');
//eliminar municipio
Route::post('EliminarMuni', 'SuperAdminController@EliminarMuni')->name('EliminarMuni');
// RUTAS DE EDUARDO CERVANTES
// ******** //// ********************////////////////
