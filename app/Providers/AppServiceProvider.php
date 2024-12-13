<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Event;
use App\Events\VisitProcessed;
use App\Listeners\SendVisitNotification;
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

        // Event::listen(
        //     VisitProcessed::class,
        //     SendVisitNotification::class,
        // );
        Route::fallback(function () {
            return view('404');
        });
    }

}
