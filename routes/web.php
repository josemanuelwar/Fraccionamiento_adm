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
