<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Designer;
use App\Models\Showcase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Designer::creating(function (Designer $designer) {
            $designer->slug = uniqid();
        });

        Showcase::creating(function (Showcase $showcase) {
            $showcase->slug = uniqid();
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
