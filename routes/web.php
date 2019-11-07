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

//ruta del centro de computo
Route::post('num_control','ccController@registrar');
Route::get('showStudents','ccController@showStudents');

//rutas del servicio social
Route::post('nuevo_servicio','ssController@registrar');
Route::post('inicioServ', 'ssController@store');
Route::get('alumnosServ','ssController@alumnosServ');
Route::get('alumnosReg','ssController@alumnosReg');
