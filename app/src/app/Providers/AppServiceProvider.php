<?php

namespace App\Providers;

use App\Models\Designer;
use App\Models\Showcase;
use App\Models\Story;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

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

        Relation::morphMap([
            'designer' => 'App\Models\Designer',
            'project' => 'App\Models\Project',
            'story' => 'App\Models\Story',
        ]);
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
