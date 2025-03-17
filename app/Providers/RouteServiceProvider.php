<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The namespace for the controllers.
     *
     * @var string
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route settings.
     */
    public function boot()
    {
        $this->routes(function () {
            // Web Routes
            Route::middleware('web')
                ->namespace($this->namespace) // Apply namespace for web routes
                ->group(base_path('routes/web.php'));

            // Admin Routes
            Route::middleware(['web', 'auth', 'is_admin'])
                ->prefix('admin')
                ->namespace($this->namespace . '\Admin') // Apply namespace for admin routes
                ->group(base_path('routes/admin.php'));
        });
    }
}
