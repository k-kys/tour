<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // User Repository
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Tag\TagRepositoryInterface::class,
            \App\Repositories\Tag\TagRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Vehicle\VehicleRepositoryInterface::class,
            \App\Repositories\Vehicle\VehicleRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Area\AreaRepositoryInterface::class,
            \App\Repositories\Area\AreaRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Location\LocationRepositoryInterface::class,
            \App\Repositories\Location\LocationRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Payment\PaymentRepositoryInterface::class,
            \App\Repositories\Payment\PaymentRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Attribute\AttributeRepositoryInterface::class,
            \App\Repositories\Attribute\AttributeRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Promotion\PromotionRepositoryInterface::class,
            \App\Repositories\Promotion\PromotionRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Tour\TourRepositoryInterface::class,
            \App\Repositories\Tour\TourRepositoryEloquent::class,
        );
        $this->app->singleton(
            \App\Repositories\Article\ArticleRepositoryInterface::class,
            \App\Repositories\Article\ArticleRepositoryEloquent::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }
}
