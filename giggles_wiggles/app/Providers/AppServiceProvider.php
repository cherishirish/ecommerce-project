<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Registry;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \View::composer('layouts/nav', function ($view) {
            $categories = Category::where('is_nav', true)->take(6)->get();
            $view->with(['categories' => $categories]);
        });
        \View::composer('*', function ($view) {
            $categories = Category::all();
            $view->with(['categories' => $categories]);
        });
        \View::composer('*', function ($view) {
            $registry = Registry::all();
            $view->with(['registries' => $registry]);
        });
       

        
    }

    
}
