<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Hekmatinasser\Verta\Verta;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('verta', function () {
            return new Verta();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::fallback(function () {
            return view('404');
        });
    }

}
