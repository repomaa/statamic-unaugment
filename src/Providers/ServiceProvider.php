<?php

namespace Statamic\Addons\Unaugment\Providers;

use Statamic\Statamic;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Http\Resources\API\Resource;
use Statamic\Http\Resources\API\EntryResource;
use Statamic\Addons\Unaugment\Http\Resources\EntryResource as CustomEntryResource;

class ServiceProvider extends AddonServiceProvider
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
        parent::boot();

        $this->publishes([
            __DIR__.'/../../resources/config/unaugment.php' => config_path('unaugment.php'),
        ], 'unaugment-config');

        Statamic::afterInstalled(function ($command) {
            $command->call('vendor:publish', ['--tag' => 'unaugment-config']);
        });

        Resource::map([
            EntryResource::class => CustomEntryResource::class
        ]);
    }
}
