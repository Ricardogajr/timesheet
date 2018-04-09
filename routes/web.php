<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/registrar', ['uses'=>'Auth\RegisterController@index', 'as' =>'auth.index']);
Route::get('/registrar/novo', ['uses'=>'Auth\RegisterController@create', 'as' =>'auth.create']);

Route::get('/resetar/senha', ['uses'=>'Auth\ResetPasswordController@showResetForm', 'as' =>'auth.reset.index']);
Route::post('/resetar/alterado', ['uses'=>'Auth\ResetPasswordController@update', 'as' =>'auth.reset.update']);


Route::get('/timesheet', ['uses'=>'TimesheetController@index', 'as' =>'timesheet.index']);
Route::get('/timesheet/novo', ['uses'=>'TimesheetController@create', 'as' =>'timesheet.create']);
Route::get('/timesheet/editar/{id}', ['uses'=>'TimesheetController@edit', 'as' =>'timesheet.edit']);
Route::post('/timesheet/atualizar/{id}', ['uses'=>'TimesheetController@update', 'as' =>'timesheet.update']);
Route::get('/timesheet/deletar/{id}', ['uses'=>'TimesheetController@destroy', 'as' =>'timesheet.destroy']);
Route::post('/timesheet/salvar', ['uses'=>'TimesheetController@store', 'as' =>'timesheet.store']);
Route::get('/timesheet/visualizar/{id}', ['uses'=>'TimesheetController@show', 'as' =>'timesheet.show']);
Route::post('/timesheet/search/', ['uses'=>'TimesheetController@search', 'as' =>'timesheet.search']);

Route::get('/cliente', ['uses'=>'ClienteController@index', 'as' =>'cliente.index']);
Route::get('/cliente/novo', ['uses'=>'ClienteController@create', 'as' =>'cliente.create']);
Route::get('/cliente/editar/{id}', ['uses'=>'ClienteController@edit', 'as' =>'cliente.edit']);
Route::put('/cliente/atualizar/{id}', ['uses'=>'ClienteController@update', 'as' =>'cliente.update']);
Route::get('/cliente/deletar/{id}', ['uses'=>'ClienteController@destroy', 'as' =>'cliente.destroy']);
Route::post('/cliente/salvar', ['uses'=>'ClienteController@store', 'as' =>'cliente.store']);
Route::get('/cliente/visualizar/{id}', ['uses'=>'ClienteController@show', 'as' =>'cliente.show']);

Route::get('/timesheet/email/{id}', ['uses'=>'TimesheetController@emailApontamento', 'as' => 'timesheet.email']);
Route::get('/timesheet/sheet/{type}',     ['uses'=>'TimesheetController@getXls', 'as' => 'timesheet.excel']);


Route::get('/projeto', ['uses'=>'ProjetoController@index', 'as' =>'projeto.index']);
Route::get('/projeto/novo', ['uses'=>'ProjetoController@create', 'as' =>'projeto.create']);
Route::get('/projeto/editar/{id}', ['uses'=>'ProjetoController@edit', 'as' =>'projeto.edit']);
Route::put('/projeto/atualizar/{id}', ['uses'=>'ProjetoController@update', 'as' =>'projeto.update']);
Route::get('/projeto/deletar/{id}', ['uses'=>'ProjetoController@destroy', 'as' =>'projeto.destroy']);
Route::post('/projeto/salvar', ['uses'=>'ProjetoController@store', 'as' =>'projeto.store']);
Route::get('/projeto/visualizar/{id}', ['uses'=>'ProjetoController@show', 'as' =>'projeto.show']);
