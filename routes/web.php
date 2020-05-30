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


Auth::routes();

Route::get('/', 'HomeController@index')->name('slash');

Route::get('/home', 'HomeController@index')->name('home');

// Karyawan Start

Route::group(['prefix' => 'karyawan', 'as' => 'karyawan.'] ,function(){

    Route::get('/index', 'KaryawanController@view')->name('index');

    Route::post('/data', 'KaryawanController@data')->name('data');

    Route::post('/submit', 'KaryawanController@submit')->name('submit');

    Route::post('/update', 'KaryawanController@update')->name('update');

});

// Gudang Start

Route::group(['prefix' => 'gudang', 'as' => 'gudang.'] ,function(){

    Route::get('/master', 'GudangController@view')->name('index');

    Route::post('/data', 'GudangController@data')->name('data');

    Route::post('/submit', 'GudangController@submit')->name('submit');

    Route::post('/update', 'GudangController@update')->name('update');

});

// Produk Start

Route::group(['prefix' => 'produk', 'as' => 'produk.'] ,function(){

    Route::get('/master', 'ProdukController@viewMaster')->name('index');

    Route::get('/po', 'ProdukController@viewPo')->name('index-po');

    Route::post('/data', 'ProdukController@data')->name('data');

    Route::post('/submit-header', 'ProdukController@submitHeader')->name('submit-header');

    Route::post('/get-id-po', 'ProdukController@getIdPo')->name('get-id-po');

});

// Supplier Start

Route::group(['prefix' => 'supplier', 'as' => 'supplier.'] ,function(){

    Route::get('/master', 'SupplierController@viewMaster')->name('index');

    Route::post('/data', 'SupplierController@data')->name('data');

    Route::post('/submit', 'SupplierController@submit')->name('submit');

});