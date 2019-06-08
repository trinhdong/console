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

Route::group(['prefix'=>'admin'],function() {
    Route::group(['prefix' => 'pets'], function () {

        Route::get('/', 'PetController@index');
        Route::get('add', function () {
            return view('admin.pets.add');
        });
        Route::post('add', 'PetController@add');
        Route::get('/delete/{id}', 'PetController@delete');
    });
    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', 'CategoryController@index');
        Route::get('add', function () {
            return view('admin.categories.add');
        });
        Route::post('add', 'CategoryController@add');
        Route::get('/delete/{id}', 'CategoryController@delete');
    });
});