<?php

namespace Lkh\RouteList;

use Illuminate\Support\ServiceProvider;
use Lkh\RouteList\Commands\GetRouteList;
class RouteListServiceProvider extends ServiceProvider
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
        //route
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        //database
        $this->loadMigrationsFrom(__DIR__.'/database');
        //views
        $this->loadViewsFrom(__DIR__.'/views', 'routelist');
        //commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                GetRouteList::class
            ]);
        }
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'routelist'
        );
        //vendor:publish
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('routelist.php'),
        ]);

    }
}
