<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Retornar checklists

Route::get('checklists', 'Api\EquipamentChecklistApi@index');

//Logar no sistema
Route::post('login', 'Api\UserApi@login');

//Retornar status equipamentos
Route::get('equipaments', 'Admin\GraficosController@index')->name('api.equipaments');

//Retornar total checklists
Route::get('checklists', 'Admin\GraficosController@checklistsPreenchidos')->name('api.checklists');