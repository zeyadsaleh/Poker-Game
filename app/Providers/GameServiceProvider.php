<?php

namespace App\Providers;

use App\Services\GameService;
use App\Services\GameServiceInterface;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(GameServiceInterface::class, GameService::class);
    }
}
