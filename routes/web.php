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
   
    Route::get('Equipamento/cadastrar', 'Admin\EquipamentTypeController@getAll')->name('equipament.store');

    Route::post('/addEquipament', 'Admin\EquipamentsController@store')->name('equipament.add');

    Route::get('Equipamento/alterar', 'Admin\EquipamentsController@getAll')->name('equipament.list');

    Route::get('Equipamento/excluir', function(){
        return view('Equipamentos/excluirEquipamento');
    })->name('equipament.store');

    Route::get('Equipamento/buscar', function(){
        return view('Equipamentos/buscarEquipamento');
    })->name('equipament.store');


});

Route::get('/teste', 'Admin\EquipamentTypeController@getName');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
