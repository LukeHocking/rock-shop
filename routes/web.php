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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/details', 'HomeController@details')->name('details');
Route::get('/myshops', 'HomeController@myshops')->name('myshops');
Route::get('/newshop', 'HomeController@newshop')->name('newshop');
Route::get('/manageshop', 'HomeController@manageshop')->name('manageshop');
Route::get('/newproduct/{shop}', 'HomeController@newproduct')->name('newproduct');
Route::resource('address', 'User\AddressController');
Route::resource('usertag', 'User\TagController');
Route::resource('shop', 'Shop\ShopController');
Route::resource('shoptag', 'Shop\TagController');
Route::resource('product', 'Product\ProductController');
