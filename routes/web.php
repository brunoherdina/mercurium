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
// EQUIPAMENTOS
Route::group(['middleware' => ['auth']], function(){
   
    //Cadastro de equipamento
    Route::get('Equipamento/cadastrar', 'Admin\EquipamentTypeController@getAll')->name('equipament.store');
    Route::post('equipament.add', 'Admin\EquipamentsController@store')->name('equipament.add');

    //Editar equipamento
    Route::get('Equipamento/alterar', 'Admin\EquipamentsController@getAll')->name('equipament.list');
    Route::get('Equipamento/editar/{id?}', 'Admin\EquipamentsController@editarEquipamento')->name('equipament.edit');
    Route::post('equipament.update/{id}', 'Admin\EquipamentsController@update')->name('equipament.update');


});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
