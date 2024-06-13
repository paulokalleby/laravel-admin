<?php

namespace App\Providers;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //Model::preventLazyLoading( !app()->isProduction() );

        Vite::macro('image', fn (string $asset) => $this->asset("resources/img/{$asset}"));
    }
}
