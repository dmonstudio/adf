<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Designer;
use App\Models\Showcase;
use App\Models\Story;

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

        Story::creating(function (Story $story) {
            $story->slug = uniqid();
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
