<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Event;
use App\Events\VisitProcessed;
use App\Listeners\SendVisitNotification;
use Illuminate\Support\Facades\Blade;
use AllowDynamicProperties;

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
        Blade::directive('checked', function ($value) {
            return "<?php echo ($value != 'off' &&  $value === 'on') ? 'checked' : ''; ?>";
            // return "<?php echo $value ";
        });
        // Event::listen(
        //     VisitProcessed::class,
        //     SendVisitNotification::class,
        // );
        Blade::directive('Jdate', function ($value) {
            return "<?php 
            echo e(Verta::parse($value)->format('Y/m/d H:i:s')); 
        ?>";
            // return "<?php echo $value ";
        });

        Route::fallback(function () {
            return view('404');
        });
    }
}
