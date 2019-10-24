<?php

Route::get('/', function () {
    return view('login');
});

Route::resource('ss', 'ssController');

Route::resource('cc', 'ccController');

Route::resource('log', 'logController');

Route::get('/viewss',function(){
    return view('vista_ss.principal_ss');
});