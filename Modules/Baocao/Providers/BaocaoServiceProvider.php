<?php

namespace Modules\Baocao\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Baocao\Events\Handlers\RegisterBaocaoSidebar;

class BaocaoServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterBaocaoSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('baocaoxuattaisans', array_dot(trans('baocao::baocaoxuattaisans')));
            $event->load('baocaonhaptaisans', array_dot(trans('baocao::baocaonhaptaisans')));
            $event->load('baocaokhacs', array_dot(trans('baocao::baocaokhacs')));
            // append translations



        });
    }

    public function boot()
    {
        $this->publishConfig('baocao', 'permissions');

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
            'Modules\Baocao\Repositories\BaocaoxuattaisanRepository',
            function () {
                $repository = new \Modules\Baocao\Repositories\Eloquent\EloquentBaocaoxuattaisanRepository(new \Modules\Baocao\Entities\Baocaoxuattaisan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Baocao\Repositories\Cache\CacheBaocaoxuattaisanDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Baocao\Repositories\BaocaonhaptaisanRepository',
            function () {
                $repository = new \Modules\Baocao\Repositories\Eloquent\EloquentBaocaonhaptaisanRepository(new \Modules\Baocao\Entities\Baocaonhaptaisan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Baocao\Repositories\Cache\CacheBaocaonhaptaisanDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Baocao\Repositories\BaocaokhacRepository',
            function () {
                $repository = new \Modules\Baocao\Repositories\Eloquent\EloquentBaocaokhacRepository(new \Modules\Baocao\Entities\Baocaokhac());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Baocao\Repositories\Cache\CacheBaocaokhacDecorator($repository);
            }
        );
// add bindings



    }
}
