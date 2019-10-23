<?php

Route::get('/', function () {
    return view('login');
});

Route::resource('ss', 'ssController');

Route::resource('cc', 'ccController');