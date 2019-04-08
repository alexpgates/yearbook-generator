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

Route::get('/layout', function () {
    return view('classroom.index');
});

Route::get('/classroom/staff', 'PageController@staff');

Route::get('/classroom/{teacher}', 'PageController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
