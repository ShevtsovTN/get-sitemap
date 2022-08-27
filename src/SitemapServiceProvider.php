<?php

namespace Sitemap;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class SitemapServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/sitemap.php' => config_path('sitemap.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/sitemap.php', 'sitemap'
        );

        $this->app->bind(SitemapStaticFactory::class);
    }
}