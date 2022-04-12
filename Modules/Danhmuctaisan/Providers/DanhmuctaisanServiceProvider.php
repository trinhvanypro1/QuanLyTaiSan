<?php

namespace Modules\Danhmuctaisan\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Danhmuctaisan\Events\Handlers\RegisterDanhmuctaisanSidebar;

class DanhmuctaisanServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterDanhmuctaisanSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('nhaptaisans', array_dot(trans('danhmuctaisan::nhaptaisans')));
            $event->load('suachuas', array_dot(trans('danhmuctaisan::suachuas')));
            $event->load('baoduongs', array_dot(trans('danhmuctaisan::baoduongs')));
            $event->load('lichsudungs', array_dot(trans('danhmuctaisan::lichsudungs')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('danhmuctaisan', 'permissions');

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
            'Modules\Danhmuctaisan\Repositories\NhaptaisanRepository',
            function () {
                $repository = new \Modules\Danhmuctaisan\Repositories\Eloquent\EloquentNhaptaisanRepository(new \Modules\Danhmuctaisan\Entities\Nhaptaisan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuctaisan\Repositories\Cache\CacheNhaptaisanDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Danhmuctaisan\Repositories\SuachuaRepository',
            function () {
                $repository = new \Modules\Danhmuctaisan\Repositories\Eloquent\EloquentSuachuaRepository(new \Modules\Danhmuctaisan\Entities\Suachua());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuctaisan\Repositories\Cache\CacheSuachuaDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Danhmuctaisan\Repositories\BaoduongRepository',
            function () {
                $repository = new \Modules\Danhmuctaisan\Repositories\Eloquent\EloquentBaoduongRepository(new \Modules\Danhmuctaisan\Entities\Baoduong());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuctaisan\Repositories\Cache\CacheBaoduongDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Danhmuctaisan\Repositories\LichsudungRepository',
            function () {
                $repository = new \Modules\Danhmuctaisan\Repositories\Eloquent\EloquentLichsudungRepository(new \Modules\Danhmuctaisan\Entities\Lichsudung());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Danhmuctaisan\Repositories\Cache\CacheLichsudungDecorator($repository);
            }
        );
// add bindings




    }
}
