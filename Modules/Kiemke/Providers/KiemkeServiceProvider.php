<?php

namespace Modules\Kiemke\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Kiemke\Events\Handlers\RegisterKiemkeSidebar;

class KiemkeServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterKiemkeSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('nhapkiemkes', array_dot(trans('kiemke::nhapkiemkes')));
            $event->load('danhmuckiemkes', array_dot(trans('kiemke::danhmuckiemkes')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('kiemke', 'permissions');

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
            'Modules\Kiemke\Repositories\NhapkiemkeRepository',
            function () {
                $repository = new \Modules\Kiemke\Repositories\Eloquent\EloquentNhapkiemkeRepository(new \Modules\Kiemke\Entities\Nhapkiemke());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Kiemke\Repositories\Cache\CacheNhapkiemkeDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Kiemke\Repositories\DanhmuckiemkeRepository',
            function () {
                $repository = new \Modules\Kiemke\Repositories\Eloquent\EloquentDanhmuckiemkeRepository(new \Modules\Kiemke\Entities\Danhmuckiemke());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Kiemke\Repositories\Cache\CacheDanhmuckiemkeDecorator($repository);
            }
        );
// add bindings


    }
}
