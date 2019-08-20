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

// Route to display the landing page where the SPA is bound
Route::get('/', function () {
    return view('welcome');
});

// Route to request all film records in the database
Route::get('/films', 'FilmController@index');

// Route to enable a user to favourite / un-favourite a film
Route::put('/films/{film}','FilmController@update');