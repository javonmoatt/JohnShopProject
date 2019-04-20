<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Repos\IProductRepository;
use App\Repos\Eloquent\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

        /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        IProductRepository::class =>  ProductRepository::class,
        IDashboardRepository::class => DashboardRepository::class,
    ];
}
