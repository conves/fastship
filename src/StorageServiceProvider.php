<?php
/**
 * Created by PhpStorm.
 * User: corneliu
 * Date: 29.04.2016
 * Time: 16:35
 */

namespace FastShip;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the Repository Service
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('FastShip\Repositories\ParcelRepository', function ($app) {
            $manager = new RepositoryManager($app);

            return $manager->driver();
        });
    }
}