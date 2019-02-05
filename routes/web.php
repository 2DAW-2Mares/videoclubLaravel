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

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return view('auth.logout');
});

Route::group(['prefix' => 'catalog'], function(){

    Route::get('/', 'CatalogController@getIndex');

    Route::get('show/{id}', 'CatalogController@getShow');

    Route::get('create', 'CatalogController@getCreate');

    Route::get('edit/{id}', 'CatalogController@getEdit');

    Route::put('changeRented/{id}', 'CatalogController@changeRented');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
