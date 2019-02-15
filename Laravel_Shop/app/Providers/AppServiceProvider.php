<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\type_product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $loaisp = type_product::all();
        view()->share('loaisp',$loaisp);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
