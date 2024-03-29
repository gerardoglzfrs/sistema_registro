<?php
//Login
Route::get('/', function () {
    return view('login');
});

//Vista principal
Route::get('/principal' , function(){
    return view('index');
});

//Login and logout
Route::resource('log', 'logController');
Route::get('/logout', 'logController@logout');

Route::post('add', 'crudController@store');
Route::get('show', 'crudController@listing');
Route::get('edit/{id}','crudController@edit');
Route::put('update/{id}','crudController@update');

Route::post('ops', 'opsController@index');

//ruta del centro de computo
Route::post('num_control','ccController@registrar');
Route::get('showStudents','ccController@showStudents');

//rutas del servicio social
Route::post('inicioServ', 'ssController@store');
Route::get('alumnosServ','ssController@alumnosServ');
Route::get('alumnosReg','ssController@alumnosReg');
//10/noviembre
Route::post('newStudent','ssController@newStudent');
Route::post('registrar', 'ssController@addNew');


//Example routs
Route::get('online','ssController@online');

//Graficas
Route::get('grph/{periodo}','ccController@estadisticas');
Route::get('showEst','ccController@showEst');
Route::get('defaultgrph','ccController@defgrph');
