<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\ItemRepository;
use App\Repository\Eloquent\SizeRepository;
use App\Repository\Eloquent\UnitRepository;
use App\Repository\ItemRepositoryInterface;
use App\Repository\SizeRepositoryInterface;
use App\Repository\UnitRepositoryInterface;
use App\Repository\BrandRepositoryInterface;
use App\Repository\ColorRepositoryInterface;
use App\Repository\Eloquent\BrandRepository;
use App\Repository\Eloquent\ColorRepository;
use App\Repository\Eloquent\StockRepository;
use App\Repository\StockRepositoryInterface;
use App\Repository\Eloquent\InvoiceRepository;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\Eloquent\SectionRepository;
use App\Repository\InvoiceRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use App\Repository\SectionRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\CustomerRepositoryInterface;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\CustomerRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\Eloquent\SubProductRepository;
use App\Repository\SubProductRepositoryInterface;
use App\Repository\AdvertisementRepositoryInterface;
use App\Repository\Eloquent\AdvertisementRepository;

/**
* Class RepositoryServiceProvider
* @package App\Providers
*/
class RepositoryServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    *
    * @return void
    */
   public function register()
   {
       $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
       $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
       $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
       $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
       $this->app->bind(UnitRepositoryInterface::class, UnitRepository::class);
       $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
       $this->app->bind(AdvertisementRepositoryInterface::class, AdvertisementRepository::class);
       $this->app->bind(StockRepositoryInterface::class, StockRepository::class);
       $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
       $this->app->bind(SubProductRepositoryInterface::class, SubProductRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
       $this->app->bind(ColorRepositoryInterface::class, ColorRepository::class);
       $this->app->bind(SizeRepositoryInterface::class, SizeRepository::class);
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
