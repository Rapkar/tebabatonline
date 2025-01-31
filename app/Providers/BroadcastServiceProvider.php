<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Middleware\AdminMiddleware;
class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Broadcast::routes(['middleware' => AdminMiddleware::class]);

     
    }
}
