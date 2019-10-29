<?php

Route::get('/', function () {
    return view('login');
});

Route::get('/viewss',function(){
    return view('vista_ss.principal_ss');
});

Route::resource('log', 'logController');

Route::resource('sa', 'userController');

Route::post('ops', 'opsController@index');

Route::resource('graficas', 'ssController');