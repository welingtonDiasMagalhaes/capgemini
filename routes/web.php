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
    return view('index');
});

Route::group(['prefix' => 'conta'], function () {
    Route::get('procurar/{conta}','ContasController@procurarConta');
    Route::post('/depositar','ContasController@depositar');
    Route::post('/sacar','ContasController@sacar');
});
