<?php

namespace Epigra\Capsule\Providers;

use Epigra\Capsule\Repositories\Capsule\CapsuleRepository;
use Epigra\Capsule\Repositories\Capsule\CapsuleRepositoryInterface;
use Epigra\Capsule\Services\Capsule\CapsuleService;
use Epigra\Capsule\Services\Capsule\CapsuleServiceInterface;
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
        //repositories
        $this->app->bind(CapsuleRepositoryInterface::class, CapsuleRepository::class);

        //services
        $this->app->bind(CapsuleServiceInterface::class, CapsuleService::class);
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
