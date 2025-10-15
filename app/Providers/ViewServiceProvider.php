<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Chia sẻ biến $categories cho tất cả các view được render bởi 'layouts.partials.header'
        View::composer('layouts.partials.header', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
