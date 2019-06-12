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
        Route::get('edit/{id}', function ($id) {
            return view('admin.pets.edit', ['pet' => \App\Pet::findOrFail($id)]);
        });
        Route::post('edit/{id}', 'PetController@edit');
        Route::delete('delete/{id}', 'PetController@delete');
        Route::get('view/{id}', 'PetController@view');
    });
    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', 'CategoryController@index');
        Route::get('add', function () {
            $pets = \App\Pet::pluck('pet_name', 'id')->toArray();
            return view('admin.categories.add', ['pets' => $pets]);
        });
        Route::post('add', 'CategoryController@add');
        Route::get('edit/{id}', function ($id) {
            $pets = \App\Pet::pluck('pet_name', 'id')->toArray();
            return view('admin.categories.edit', ['category' => \App\Category::findOrFail($id), 'pets' => $pets]);
        });
        Route::post('edit/{id}', 'CategoryController@edit');
        Route::delete('delete/{id}', 'CategoryController@delete');
        Route::get('view/{id}', 'CategoryController@view');
    });
   
    Route::group(['prefix' => 'typeproduct'], function (){
        Route::get('/', 'TypeProductController@index');
        Route::get('add', function () {
            $categories = \App\Category::pluck('category_name', 'id')->toArray();
            return view('admin.typeproduct.add',['categories' => $categories]);
        });
        Route::post('add', 'TypeProductController@add');
        Route::get('edit/{id}', function ($id){
            $categories = \App\Category::pluck('category_name','id')->toArray();
            return view('admin.typeproduct.edit',['product_types' => \App\TypeProduct::findOrFail($id), 'categories' => $categories
            ]);
        }); 
        Route::post('edit/{id}', 'TypeProductController@edit');
        Route::get('view/{id}', 'TypeProductController@view');
        Route::get('delete/{id}', 'TypeProductController@delete');
    });
});