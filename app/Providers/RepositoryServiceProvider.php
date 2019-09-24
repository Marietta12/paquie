<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(\App\Interfaces\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Interfaces\ProductRepositoryInterface::class, \App\Repositories\ProductRepository::class);
        $this->app->bind(\App\Interfaces\OrderProductRepositoryInterface::class, \App\Repositories\OrderProductRepository::class);
        $this->app->bind(\App\Interfaces\BlogRepositoryInterface::class, \App\Repositories\BlogRepository::class);
        $this->app->bind(\App\Interfaces\CommandRepositoryInterface::class, \App\Repositories\CommandRepository::class);
        $this->app->bind(\App\Interfaces\CategoryRepositoryInterface::class, \App\Repositories\CategoryRepository::class);
        $this->app->bind(\App\Interfaces\FAQsRepositoryInterface::class, \App\Repositories\FAQsRepository::class);
    }
}