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
    return view('/welcome');
});


Route::get('uploadfiles', function () {
    return view('uploadfiles');
});



Route::get('/nuevo', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('formSubmit','FileController@formSubmit');
Route::get('/listar/archivos', 'FileController@listar');
Route::post('/eliminar/archivos', 'FileController@eliminar');
Route::post('/formSubmit/editar', 'FileController@editar');

Route::post('/agregar/users', 'UserController@agregar');
Route::get('/listar/nations', 'NationController@listar');
