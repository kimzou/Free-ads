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

Route::get('/', 'IndexController@showIndex');

Auth::routes(['verify' => true]);

Route::get('home', 'HomeController@index')->name('home');

Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('verified');
Route::put('user/{id}/edit', 'UserController@update')->name('user.update')->middleware('verified');
Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy')->middleware('verified');

Route::get('ad/{id}/show', 'AdController@show')->name('ad.show');
Route::resource('ad', 'AdController')->except('show', 'update', 'destroy');
Route::put('ad/{id}', 'AdController@update')->name('ad.update')->middleware('verified');
Route::delete('ad/{id}', 'AdController@destroy')->name('ad.destroy')->middleware('verified');
Route::get('ad/{id}/ads', 'AdController@myAds')->name('ad.user')->middleware('verified');
Route::get('ad/search', 'AdSearchController@search')->name('ad.search');
Route::post('ad/results', 'AdSearchController@results')->name('ad.results');
Route::get('ad/order-by-date', 'AdSearchController@order')->name('ad.order');

Route::get('contact', 'MailController@contact')->name('contact')->middleware('verified');