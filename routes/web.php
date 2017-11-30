<?php

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'as'=>'admin.'], function() {
    Route::get('inicio', ['as' => 'inicio', 'uses' => 'HomeController@index']);
    Route::resource('usuarios', 'UsersController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);
    Route::resource('fincas', 'FarmsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);
    Route::resource('animales', 'AnimalsController', ['only' => ['index', 'create', 'store']]);
    Route::resource('inspecciones', 'InspectionsController');
    Route::get('historial', ['as' => 'historial', 'uses' => 'HistoryController@index']);
});
