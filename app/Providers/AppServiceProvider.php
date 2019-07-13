<?php

namespace App\Providers;

use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Category;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('header' , function($view){
            $cartContent = Cart::getContent();
            $cartTotal = Cart::getTotal();
            $categoryMenu = Category::all();
            $view->with(['cartContent' => $cartContent, 'cartTotal' => $cartTotal, 'categoryMenu' => $categoryMenu]);
        });
    }
}
