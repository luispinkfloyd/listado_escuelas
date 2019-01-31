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
    return redirect('home');
});

//Route::get('/secundarios_caba','SecundariosCabaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('caba','CabaController@index');

Route::get('conurbano','ConurbanoController@index');

Route::resource('superior_conurbano','SuperiorConurbanoController');

Route::resource('superior_caba','SuperiorCabaController');

Route::resource('secundario_conurbano','SecundarioConurbanoController');

Route::resource('secundario_caba','SecundarioCabaController');

Route::get('busqueda_secundario_caba','SecundarioCabaController@search')->name('busqueda_secundario_caba');

Route::get('busqueda_superiores_caba','SuperiorCabaController@search')->name('busqueda_superiores_caba');

Route::get('busqueda_secundario_conurbano','SecundarioConurbanoController@search')->name('busqueda_secundario_conurbano');

Route::get('busqueda_superior_conurbano','SuperiorConurbanoController@search')->name('busqueda_superior_conurbano');