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
    Route::post('Equipamento/atualizar/{id}', 'Admin\EquipamentsController@update')->name('equipament.update');

    //Excluir equipamento
    Route::post('Equipamento/excluir/{id?}', 'Admin\EquipamentsController@destroy')->name('equipament.destroy');

    //Adicionar tipo de equipamento
    Route::get('Equipamento/tipos', 'Admin\EquipamentTypeController@index')->name('equipamentTypes');
    Route::post('Equipamento/adicionarTipo', 'Admin\EquipamentTypeController@store')->name('type.store');

    //Editar tipo
    Route::get('Equipamento/editarTipo/{id?}', 'Admin\EquipamentTypeController@editarTipo')->name('type.edit');
    Route::post('Equipamento/atualizarTipo/{id}', 'Admin\EquipamentTypeController@update')->name('type.update');

    //Excluir tipo
    Route::post('Equipamento/excluirTipo/{id?}', 'Admin\EquipamentTypeController@destroy')->name('type.destroy');
});

//USUÁRIOS

Route::group(['middleware' => ['auth']], function(){

    //Cadastro de usuários
    Route::get('Usuarios/cadastrar', 'Admin\EmployeePositionController@getAll')->name('user.add');
    Route::post('Usuarios/cadastrar', 'Admin\UserController@store')->name('user.store');

    //Buscar usuário
    Route::match(['get', 'post'], 'Usuarios/buscar', 'Admin\UserController@search')->name('user.search');

    //Excluir usuário
    Route::post('Usuario/excluir/{id}', 'Admin\UserController@destroy')->name('user.destroy');
});

//CHECKLISTS

Route::group(['middleware' => ['auth']], function(){

    //Cadastrar checklist
    Route::get('Checklists/novo', function(){
        return view('Checklists.cadastrar');
    })->name('checklist.add');
});




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
