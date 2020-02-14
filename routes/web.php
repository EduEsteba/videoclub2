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


Route::get('/', 'HomeController@getHome');

Route::get('catalog', 'CatalogController@getIndex')->middleware('auth');

Route::get('catalog/show/{id}', 'CatalogController@getShow')->middleware('auth');

Route::get('catalog/create', 'CatalogController@getCreate')->middleware('auth');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');

Auth::Routes();

Route::get('/home', 'HomeController@index')->name('home');

// Crea una nova pel·lícula
Route::get('/catalog/create', 'CatalogController@getCreate')->middleware('auth');
Route::post('/catalog/create', 'CatalogController@postCreate')->middleware('auth');

// Edita una pel·lícula
Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit')->middleware('auth');

Route::put('catalog/rent/{id}', 'CatalogController@putRent')->middleware('auth');
Route::put('catalog/return/{id}', 'CatalogController@putReturn')->middleware('auth');
Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie')->middleware('auth');




Route::post('/review/create/{id}', 'CatalogController@postReview')->middleware('auth');
Route::post('/catalog', 'CatalogController@search')->name('catalog.search');


/*Rutes de les categories*/
/*Route::get('/category','CategoryController@index')->middleware('auth');;
Route::get('/category/create','CategoryController@create')->middleware('auth');;
Route::post('/category','CategoryController@store')->middleware('auth');;
Route::get('/category/{id}','CategoryController@show')->middleware('auth');;
Route::get('/category/{id}/edit','CategoryController@edit')->middleware('auth');;
Route::put('/category/{id}','CategoryController@update')->middleware('auth');;
Route::delete('/category/{id}','CategoryController@destroy')->middleware('auth');;
*/









