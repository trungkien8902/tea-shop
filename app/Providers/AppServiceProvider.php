<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Helper\CartHelper;
use App\Models\Category;
use App\Models\Order;

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
        view()->composer('*', function($view) {
            $view->with([
                'category' => Category::where('is_active', 1)->orderBy('name', 'ASC')->get(),
                'cart' => new CartHelper(),
                'order_count' => Order::where('status', 0)->count()
            ]);
        });
        Paginator::useBootstrap();
    }
}
