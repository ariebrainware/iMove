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

// Route::get('customer', 'CustomerController@index');
// Route::get('customer/add', 'CustomerController@add');
// Route::post('customer/add', 'CustomerController@store');
// Route::get('customer/{id}', 'CustomerController@edit');
// Route::put('customer/{id}', 'CustomerController@update');
// Route::delete('customer/{id}', 'CustomerController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
