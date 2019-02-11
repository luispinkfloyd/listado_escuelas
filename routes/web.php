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

Route::get('busqueda_secundarios_caba','SecundarioCabaController@search')->name('busqueda_secundarios_caba');

Route::get('busqueda_superiores_caba','SuperiorCabaController@search')->name('busqueda_superiores_caba');

Route::get('busqueda_secundarios_conurbano','SecundarioConurbanoController@search')->name('busqueda_secundarios_conurbano');

Route::get('busqueda_superiores_conurbano','SuperiorConurbanoController@search')->name('busqueda_superiores_conurbano');

Route::get('superiores_caba_excel','SuperiorCabaController@export_excel')->name('superiores_caba_excel');

Route::get('secundarios_caba_excel','SecundarioCabaController@export_excel')->name('secundarios_caba_excel');

Route::get('superiores_conurbano_excel','SuperiorConurbanoController@export_excel')->name('superiores_conurbano_excel');

Route::get('secundarios_conurbano_excel','SecundarioConurbanoController@export_excel')->name('secundarios_conurbano_excel');