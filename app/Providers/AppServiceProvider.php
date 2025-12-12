<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use Doctrine\DBAL\Types\Type;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          Schema::defaultStringLength(191);

    if (Type::hasType('enum') === false) {
        Type::addType('enum', \Doctrine\DBAL\Types\StringType::class);
    }

    $platform = \DB::getDoctrineConnection()->getDatabasePlatform();
    $platform->registerDoctrineTypeMapping('enum', 'string');
    }
}
