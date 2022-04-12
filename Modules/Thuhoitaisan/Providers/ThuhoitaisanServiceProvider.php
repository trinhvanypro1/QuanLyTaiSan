<?php

namespace Modules\Thuhoitaisan\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Thuhoitaisan\Events\Handlers\RegisterThuhoitaisanSidebar;

class ThuhoitaisanServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterThuhoitaisanSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('thuhoitaisans', array_dot(trans('thuhoitaisan::thuhoitaisans')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('thuhoitaisan', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Thuhoitaisan\Repositories\ThuhoitaisanRepository',
            function () {
                $repository = new \Modules\Thuhoitaisan\Repositories\Eloquent\EloquentThuhoitaisanRepository(new \Modules\Thuhoitaisan\Entities\Thuhoitaisan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Thuhoitaisan\Repositories\Cache\CacheThuhoitaisanDecorator($repository);
            }
        );
// add bindings

    }
}
