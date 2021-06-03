<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\RegionRepositoryInterface;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\ExpectedProductRepositoryInterface;
use App\Repositories\Interfaces\PlantedProductRepositoryInterface;
use App\Repositories\Interfaces\StoredProductRepositoryInterface;
use App\Repositories\RegionRepository;
use App\Repositories\BaseRepository;
use App\Repositories\DistrictRepository;
use App\Repositories\ExpectedProductRepository;
use App\Repositories\PlantedProductRepository;
use App\Repositories\StoredProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class );
        $this->app->bind(RegionRepositoryInterface::class, RegionRepository::class );
        $this->app->bind(DistrictRepositoryInterface::class, DistrictRepository::class );
        $this->app->bind(ExpectedProductRepositoryInterface::class, ExpectedProductRepository::class );
        $this->app->bind(PlantedProductRepositoryInterface::class, PlantedProductRepository::class );
        $this->app->bind(StoredProductRepositoryInterface::class, StoredProductRepository::class );
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
