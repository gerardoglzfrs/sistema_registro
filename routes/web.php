<?php
//Login
Route::get('/', function () {
    return view('login');
});

//Vista principal
Route::get('/principal' , function(){
    return view('index');
});

Route::resource('log', 'logController');

Route::post('add', 'crudController@store');
Route::get('show', 'crudController@listing');

Route::post('ops', 'opsController@index');

Route::post('num_control','ccController@registrar');
Route::get('showStudents','ccController@showStudents');

Route::post('nuevo_servicio','ssController@registrar');
