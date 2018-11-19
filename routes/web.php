<?php

//***************************
//*********ADMINISTRADORES***
//***************************

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

    //LOGIN
    Route::post('login', 'Admin\UserController@login');

    //Cadastro de usuários
    Route::get('Usuarios/cadastrar', 'Admin\UserController@getAll')->name('user.add');
    Route::post('Usuarios/cadastrar', 'Admin\UserController@store')->name('user.store');

    //Buscar usuário
    Route::match(['get', 'post'], 'Usuarios/buscar', 'Admin\UserController@search')->name('user.search');

    //Excluir usuário
    Route::post('Usuario/excluir/{id}', 'Admin\UserController@destroy')->name('user.destroy');
});

//CHECKLISTS

Route::group(['middleware' => ['auth']], function(){

    //Cadastrar checklist
    Route::get('Checklists/novo', 'Admin\EquipamentChecklistController@novo')->name('checklist.add');
    Route::post('Checklists/novo', 'Admin\EquipamentChecklistController@store')->name('checklist.store');

    //Listar checklists
    Route::get('Checklists/listar', 'Admin\EquipamentChecklistController@listar')->name('checklist.list');

    //Exibir checklist
    Route::get('Checklists/listar/{id}', 'Admin\EquipamentChecklistController@show')->name('checklist.show');

    //Excluir checklist
    Route::post('Checklists/alterar/{id}', 'Admin\EquipamentChecklistController@delete')->name('checklist.destroy');

    //Tornar checklist padrão
    Route::post('Checklists/listar/tornarPadrao/{id}', 'Admin\EquipamentChecklistController@tornarPadrao')->name('checklist.inUse');
});



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//***************************
//*********OPERACIONAL*******
//***************************

Route::group(['middleware' => ['auth']], function(){


    //Meus checklists
    Route::get('Operacional', 'Admin\OperacionalController@myChecklists')->name('operacional.myChecklists');

    //Novo checklists
    Route::get('Operacional/novo', 'Admin\OperacionalController@newChecklist')->name('operacional.newChecklist');

    //Salvar checklist
    Route::post('Operacional/novo', 'Admin\OperacionalController@storeChecklist')->name('operacional.storeChecklist');

    //Exibir checklist
    Route::get('Operacional/exibir/{id}', 'Admin\OperacionalController@showChecklist')->name('operacional.showChecklist');

    //Perfil
    Route::get('Operacional/perfil', 'Admin\OperacionalController@showProfile')->name('operacional.profile');

    //Alterar senha
    Route::get('Operacional/perfil/alterarSenha', function() {
        $user = Auth::user();
        return view('Operacional.alterarSenha', [
            'user' => $user,
        ]);
    })->name('operacional.alterarSenha');

    Route::post('Operacional/perfil/alterarSenha/{id}', 'Admin\OperacionalController@alterarSenha')->name('operacional.passwordUpdate');

    //Informações
    Route::get('Operacional/info', function(){
        return view('Operacional.informacoes');
    })->name('operacional.info');

    //Logout
    Route::get('Operacional/logout', 'Admin\OperacionalController@logout')->name('logout');
});
