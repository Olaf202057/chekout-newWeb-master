<?php

namespace App\Providers;

use App\Repositories\DetailedAdAnalytics\DetailedAdAnalyticsRepository;
use App\Repositories\DetailedAdAnalytics\DetailedAdAnalyticsRepositoryInterface;
use App\Repositories\OverviewAdAnalytics\OverviewAdAnalyticsRepository;
use App\Repositories\OverviewAdAnalytics\OverviewAdAnalyticsRepositoryInterface;
use App\Repositories\Users\UsersFirebaseRepository;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Vendors\VendorsFirebaseRepository;
use App\Repositories\Vendors\VendorsRepositoryInterface;
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
        $this->app->bind(UsersRepositoryInterface::class, UsersFirebaseRepository::class);
        $this->app->bind(VendorsRepositoryInterface::class, VendorsFirebaseRepository::class);
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
