<?php

namespace App\Providers;

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
        view()->composer('admin.expected-products.form', function($view){
            $districts=\App\Models\District::all();
            $regions=\App\Models\Region::all();
            $quarters=\App\Models\Quarter::all();
            $streets=\App\Models\Street::all();
            $firms=\App\Models\Firm::all();
            $view->with(compact('regions', 'districts', 'quarters', 'streets', 'firms'));
        });

        view()->composer('admin.planted-products.form', function($view){
            $districts=\App\Models\District::all();
            $regions=\App\Models\Region::all();
            $quarters=\App\Models\Quarter::all();
            $streets=\App\Models\Street::all();
            $firms=\App\Models\Firm::all();
            $view->with(compact('regions', 'districts', 'quarters', 'streets', 'firms'));
        });

        view()->composer('admin.stored-products.form', function($view){
            $districts=\App\Models\District::all();
            $regions=\App\Models\Region::all();
            $quarters=\App\Models\Quarter::all();
            $streets=\App\Models\Street::all();
            $firms=\App\Models\Firm::all();
            $view->with(compact('regions', 'districts', 'quarters', 'streets', 'firms'));
        });
    }
}
