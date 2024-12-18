<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');
Route::get('/import', 'IndexController@import');
Route::get('/populate', 'IndexController@populate');
