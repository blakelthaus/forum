<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        //\View::share('channels', Channel::all()); //this would work if we had a static/production db
        \View::composer('*', function($view) {
            $view->with('channels', Channel::all());
        });  //this is used for testing purposes since we are running database migrations every test it doesn't require the data until the view is loaded.

    }
}
