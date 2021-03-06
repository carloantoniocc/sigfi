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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Administración de usuarios
Route::resource('users','UserController');

Route::resource('categorias','CategoriaController');

Route::resource('productos','ProductoController');

Route::resource('proveedors','ProveedorController');

Route::resource('compras','CompraController');

Route::resource('dashboards','DashboardController');


