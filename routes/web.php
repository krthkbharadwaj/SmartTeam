<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/apply-leave', 'ApplyLeaveController@index');

Route::get('/apply-leave', function () {
    return view('apply-leave');
});

Route::post('/apply-leave-submit', 'ApplyLeaveController@apply_leave');
