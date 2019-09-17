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

Route::get('usability', function () {
    return view('usability');
});

//Rutas del crud

Route::get('crudMvc', function () {
    return view('crudMvc');
});
Route::get('/casas', 'ControllerCasas@listar');
Route::post('/casas/agregar','ControllerCasas@agregar');
Route::post('/casas/editar','ControllerCasas@editar');
Route::post('/casas/eliminar','ControllerCasas@eliminar');

//--->

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


Route::post('usability', 'UsabilityController@store');
Route::get('email/check', 'UsabilityController@checkEmail');
Route::get('name/check', 'UsabilityController@checkName');

Route::get('/listar/giros', 'GirosController@listar');
