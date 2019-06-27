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
Route::get('/' ,[
    'as' => 'home',
    'uses' => 'PageController@getIndex'
]);

Route::get('producttype', [
    'as' =>'producttype',
    'uses' => 'PageController@getProducts'
]);
Route::get('productdetails' , [
    'as' => 'productdetails',
    'uses' => 'PageController@getProductDetails'
]);
Route::get('contact' , [
    'as' => 'contact',
    'uses' => 'PageController@getContact'
]);

Route::get('/login', function () {
    return view('admin.login');
});

Route::post('/login', 'AdminUserController@login');
Route::get('/logout', 'AdminUserController@logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.home');
    });

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
        Route::get('delete/{id}', 'PetController@delete');
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
        Route::get('delete/{id}', 'CategoryController@delete');
        Route::get('view/{id}', 'CategoryController@view');
    });

    Route::group(['prefix' => 'product-types'], function () {
        Route::get('/', 'ProductTypeController@index');
        Route::get('add', function () {
            $categories = \App\Category::pluck('category_name', 'id')->toArray();
            $pets = \App\Pet::pluck('pet_name', 'id')->toArray();
            return view('admin.product-types.add', ['categories' => $categories, 'pets' => $pets]);
        });
        Route::post('add', 'ProductTypeController@add');
        Route::get('edit/{id}', function ($id) {
            $pets = \App\Pet::pluck('pet_name', 'id')->toArray();
            $categories = \App\Category::pluck('category_name', 'id')->toArray();
            return view('admin.product-types.edit', [
                'productType' => \App\ProductType::findOrFail($id),
                'categories' => $categories,
                'pets' => $pets
            ]);
        });
        Route::post('edit/{id}', 'ProductTypeController@edit');
        Route::get('delete/{id}', 'ProductTypeController@delete');
        Route::get('view/{id}', 'ProductTypeController@view');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('add' , function () {
            $productTypes = \App\ProductType::pluck('type_name', 'id')->toArray();
            return view('admin.products.add', ['productTypes' => $productTypes]);
        });
        Route::post('add' , 'ProductController@add');
        Route::get('edit/{id}' , function ($id) {
            $productTypes = \App\ProductType::pluck('type_name', 'id')->toArray();
            return view('admin.products.edit', ['products' => \App\Product::findOrFail($id), 'productTypes' => $productTypes
            ]);
        });
        Route::post('edit/{id}' , 'ProductController@edit');
        Route::get('view/{id}', 'ProductController@view');
        Route::get('delete/{id}', 'ProductController@delete');
    });
    Route::group(['prefix' => 'admin-users'], function () {
        Route::get('/', 'AdminUserController@index');
        Route::get('add', function () {
            return view('admin.admin-users.add');
        });
        Route::post('add', 'AdminUserController@add');
        Route::get('edit/{id}', function ($id) {
            return view('admin.admin-users.edit', ['adminUser' => \App\AdminUser::findOrFail($id)]);
        });
        Route::post('edit/{id}', 'AdminUserController@edit');
        Route::get('delete/{id}', 'AdminUserController@delete');
        Route::get('view/{id}', 'AdminUserController@view');
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'AdminOrderController@index');
        Route::get('view/{id}', 'AdminOrderController@view');
        Route::post('update/{id}', 'AdminOrderController@update');
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('categories/{petId}', 'AjaxController@getCategoriesByPetId');
    });
});
