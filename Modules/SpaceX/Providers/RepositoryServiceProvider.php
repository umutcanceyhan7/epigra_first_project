<?php

namespace Epigra\SpaceX\Providers;

use Epigra\SpaceX\Repositories\SpaceX\SpaceXRepository;
use Epigra\SpaceX\Repositories\SpaceX\SpaceXRepositoryInterface;
use Epigra\SpaceX\Services\SpaceX\SpaceXService;
use Epigra\SpaceX\Services\SpaceX\SpaceXServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //services
        $this->app->bind(SpaceXServiceInterface::class, SpaceXService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
