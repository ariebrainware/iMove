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

Route::get('item', 'ItemController@index');
Route::get('item/add', 'ItemController@add');
Route::post('item/add', 'ItemController@store');
Route::get('item/{id}', 'ItemController@edit');
Route::put('item/{id}', 'ItemController@update');
Route::delete('item/{id}', 'ItemController@delete');

Route::get('recipient', 'RecipientController@index');
Route::get('recipient/add', 'RecipientController@add');
Route::post('recipient/add', 'RecipientController@store');
Route::get('recipient/{id}', 'RecipientController@edit');
Route::put('recipient/{id}', 'RecipientController@update');
Route::delete('recipient/{id}', 'RecipientController@delete');

Route::get('sender', 'SenderController@index');
Route::get('sender/add', 'SenderController@add');
Route::post('sender/add', 'SenderController@store');
Route::get('sender/{id}', 'SenderController@edit');
Route::put('sender/{id}', 'SenderController@update');
Route::delete('sender/{id}', 'SenderController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
