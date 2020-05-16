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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('tasks.index');
});
/*

	Controllador de tareas

	IMPORTANT!!!
	Except => indica que rutas no se utilizan

*/
Route::resource('tasks', 'TaskController', ['except'=> 'show','create', 'edit']);
