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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//To show the article creation form page
Route::get('/create', 'ConsumeApiController@create');

//To sstore the article in the database
Route::post('/create', 'ConsumeApiController@store')->name('create');

//To show all artcles list
Route::get('/', 'ConsumeApiController@index')->name('show');

//To show a single article
Route::get('/show/{id}', 'ConsumeApiController@show');

//To show the article edit form page
Route::get('/edit/{id}', 'ConsumeApiController@edit');

//To update a single article
Route::post('/edit/{id}', 'ConsumeApiController@update');

//To delete a single article
Route::get('/delete/{id}', 'ConsumeApiController@destroy');

