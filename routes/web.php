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

Route::group( ['prefix' => 'admin', 'middleware' => 'auth'], function(){
  Route::get('/home', 'ProductsController@index')->name('home');
  Route::get('/search', 'HomeController@index')->name('search');

  Route::resource('products', 'ProductsController');
  Route::get('products/search', [
    'uses' => 'ProductsController@search',
    'as' => 'products.search'
  ]);
});
