<?php

namespace Modules\Danhmuc\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Danhmuc\Events\Handlers\RegisterDanhmucSidebar;

class DanhmucServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterDanhmucSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('danhmucphongbans', array_dot(trans('danhmuc::danhmucphongbans')));
            $event->load('danhmucnhanviens', array_dot(trans('danhmuc::danhmucnhanviens')));
            $event->load('danhmucnhacungcaps', array_dot(trans('danhmuc::danhmucnhacungcaps')));
            $event->load('danhmucloaitaisans', array_dot(trans('danhmuc::danhmucloaitaisans')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('danhmuc', 'permissions');

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
            'Modules\Danhmuc\Repositories\DanhmucphongbanRepository',
            function () {
                $repository = new \Modules\Danhmuc\Repositories\Eloquent\EloquentDanhmucphongbanRepository(new \Modules\Danhmuc\Entities\Danhmucphongban());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuc\Repositories\Cache\CacheDanhmucphongbanDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Danhmuc\Repositories\DanhmucnhanvienRepository',
            function () {
                $repository = new \Modules\Danhmuc\Repositories\Eloquent\EloquentDanhmucnhanvienRepository(new \Modules\Danhmuc\Entities\Danhmucnhanvien());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuc\Repositories\Cache\CacheDanhmucnhanvienDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Danhmuc\Repositories\DanhmucnhacungcapRepository',
            function () {
                $repository = new \Modules\Danhmuc\Repositories\Eloquent\EloquentDanhmucnhacungcapRepository(new \Modules\Danhmuc\Entities\Danhmucnhacungcap());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuc\Repositories\Cache\CacheDanhmucnhacungcapDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Danhmuc\Repositories\DanhmucloaitaisanRepository',
            function () {
                $repository = new \Modules\Danhmuc\Repositories\Eloquent\EloquentDanhmucloaitaisanRepository(new \Modules\Danhmuc\Entities\Danhmucloaitaisan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuc\Repositories\Cache\CacheDanhmucloaitaisanDecorator($repository);
            }
        );
// add bindings




    }
}
