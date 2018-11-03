<?php

namespace App\Providers;

use Parsedown;
use App\Models\Story;
use App\Models\Designer;
use App\Models\Showcase;
use App\Services\BladeMinifier;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupEloquentEvents();

        $this->setupMorphKeys();
    }

    private function setupEloquentEvents()
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

    private function setupMorphKeys()
    {
        Relation::morphMap([
            'designer' => 'App\Models\Designer',
            'project' => 'App\Models\Project',
            'story' => 'App\Models\Story',
            'page' => 'App\Models\Page'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->overrideBladeMinifier();

        $this->setupMarkdownService();
    }

    private function overrideBladeMinifier()
    {
        $this->app->singleton('htmlmin.blade', function (Container $app) {
            $force = $app->config->get('htmlmin.force', false);

            return new BladeMinifier($force);
        });

        $this->app->alias('htmlmin.blade', BladeMinifier::class);
    }

    private function setupMarkdownService()
    {
        $this->app->singleton('markdown', function (Container $app) {
            return new Parsedown();
        });
    }
}
