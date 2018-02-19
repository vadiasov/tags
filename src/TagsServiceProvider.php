<?php

namespace Vadiasov\Tags;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class TagsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('tags', \Vadiasov\Tags\Middleware\TagsMiddleware::class);
        
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'tags');
        $this->loadViewsFrom(__DIR__ . '/Views', 'tags');
        
        $this->publishes([
            __DIR__ . '/Config/tags.php' => config_path('tags.php'),
        ], 'tags_config');
        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/tags'),
        ], 'tags_assets');
        $this->publishes([
//            __DIR__ . '/Translations' => resource_path('lang/vadiasov/admin/tags'),
//            __DIR__ . '/Views'        => resource_path('views/vadiasov/admin/tags'),
            __DIR__ . '/Seeds'         => database_path('seeds'),
            __DIR__ . '/Migrations'   => database_path('migrations'),
        ]);
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Vadiasov\Tags\Controllers\TagsController');
        $this->app->make('Vadiasov\Tags\Requests\TagRequest');
        $this->mergeConfigFrom(
            __DIR__ . '/Config/tags.php', 'tags'
        );
    }
}
