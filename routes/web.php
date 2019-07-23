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


Route::get('/', 'IndexController@index');

Route::prefix('index')->group(function () {

    Route::get('/', 'IndexController@index');
    Route::post('/ajax/{type}', 'IndexController@ajax')->name('type');
});

Route::prefix('attribute')->group(function () {

    Route::get('/', 'AttributeController@index')->middleware('auth');
    Route::post('/ajax/{type}', 'AttributeController@ajax')->name('type');

});

Route::prefix('product')->group(function () {

    Route::get('/', 'ProductController@index')->middleware('auth');
    Route::get('/create', 'ProductController@create');
    Route::get('/edit/{id}', 'ProductController@edit')->name('id');
    Route::post('/ajax/{type}', 'ProductController@ajax')->name('type');

});

Auth::routes();