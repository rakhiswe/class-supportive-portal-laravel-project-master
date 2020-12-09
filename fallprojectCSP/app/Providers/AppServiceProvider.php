<?php

namespace App\Providers;
use View;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        
        View::composer('admin.layouts.master',function($view){
            $a="badhon ghosh";
            $view->with('name',$a);
        });
    }
}
