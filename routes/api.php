<?php

Route::post('login', 'Auth\LoginController@remoteLogin');
Route::group(['middleware' => 'jwt.auth'], function() {
    Route::get('get/fincas/{region}', 'Api\FarmsController');
    Route::get('get/animales/{farm}', 'Api\AnimalsController');
    Route::post('create/inspecciones', 'Api\InspectionsController');
});
