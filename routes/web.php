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
Route::get('dang-nhap', 'PageController@getLogin');
Route::post('dang-nhap', 'PageController@postLogin');
Route::get('dang-ky', 'PageController@getSignUp');
Route::post('dang-ky', 'PageController@postSignUp');
Route::get('dang-xuat', 'PageController@getLogout');

Route::get('/' , 'PageController@index');
Route::get('danh-muc/{id}/{categoryName}', 'PageController@categories');
Route::get('loai-san-pham/{id}/{productTypeName}', 'PageController@productTypes');
Route::get('chi-tiet-san-pham/{id}/{productName}', 'PageController@productDetail');
Route::get('lien-he', 'PageController@getContact');
Route::post('login-checkout', 'PageController@loginCheckout');
Route::post('sign-up', 'PageController@signUpCheckout');

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('mua-hang/{id}/{productName}','CartController@addProductCart');
Route::get('delete/{id}', 'CartController@deleteProductCart');
Route::get('update', 'CartController@updateProductCart');
Route::get('gio-hang', 'CartController@Cart');

Route::get('dat-hang', 'CartController@getCheckOut');
Route::post('dat-hang', 'CartController@postCheckOut');

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
            $step = $_GET['step'];
            $pets = \App\Pet::pluck('pet_name', 'id')->toArray();
            if ($step == 2) {
                $pet_id = $_GET['pet_id'];
                $categories = \App\Category::getCategoryByPetId($pet_id);
                $productTypes = \App\ProductType::pluck('type_name', 'id')->toArray();
                return view('admin.products.add', ['productTypes' => $productTypes,'categories' => $categories, 'step' => $step]);
            }
            return view('admin.products.add', ['pets' => $pets, 'step' => $step]);
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
        Route::get('delete/{id}', 'AdminOrderController@delete');
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('categories/{petId}', 'AjaxController@getCategoriesByPetId');
        Route::get('product-types/{categoryId}', 'AjaxController@getProductTypesByCategoryId');
    });
});
