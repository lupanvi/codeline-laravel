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
    return redirect('/home');
});

Route::get('/to', function () {
    return redirect('/films');
});

Route::resource('/films', 'FilmsController');
Route::post('/comments/{film}', 'CommentsController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
