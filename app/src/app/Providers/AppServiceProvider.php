<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Designer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Designer::saving(function (Designer $designer) {
            if (is_null($designer->slug)) {
                $designer->slug = uniqid();
            }
        });
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
