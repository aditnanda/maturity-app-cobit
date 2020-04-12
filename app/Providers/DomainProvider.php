<?php

namespace App\Providers;

use App\Domain; 
use Illuminate\Support\ServiceProvider;

class DomainProvider extends ServiceProvider
{
    
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('domainname_array', Domain::all());
        });
    }

}
