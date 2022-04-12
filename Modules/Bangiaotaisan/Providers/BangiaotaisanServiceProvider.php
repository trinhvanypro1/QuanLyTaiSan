<?php

namespace Modules\Bangiaotaisan\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Bangiaotaisan\Events\Handlers\RegisterBangiaotaisanSidebar;

class BangiaotaisanServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterBangiaotaisanSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('bangiaotaisans', array_dot(trans('bangiaotaisan::bangiaotaisans')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('bangiaotaisan', 'permissions');

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
            'Modules\Bangiaotaisan\Repositories\BangiaotaisanRepository',
            function () {
                $repository = new \Modules\Bangiaotaisan\Repositories\Eloquent\EloquentBangiaotaisanRepository(new \Modules\Bangiaotaisan\Entities\Bangiaotaisan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bangiaotaisan\Repositories\Cache\CacheBangiaotaisanDecorator($repository);
            }
        );
// add bindings

    }
}
