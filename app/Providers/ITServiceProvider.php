<?php

namespace App\Providers;

use App\Service; 
use Illuminate\Support\ServiceProvider;

class ITServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('servicename_array', Service::all());
        });
    }
}
