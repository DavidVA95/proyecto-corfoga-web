<?php

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'as'=>'admin.'], function() {
    Route::get('inicio', 'HomeController@index');
    Route::resource('usuarios', 'UsersController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('fincas', 'FarmsController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
    Route::resource('animales', 'AnimalsController');
    Route::resource('inspecciones', 'InspectionsController');
    Route::get('historial', 'HistoryController@index');
});
