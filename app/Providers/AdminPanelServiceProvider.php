<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
class AdminPanelServiceProvider extends ServiceProvider
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
        // Define admin routes
        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
                ->name('admin.dashboard');
        });

        // Define gates for role-based access control
        Gate::define('view-admin-dashboard', function ($user) {
            return $user->role === 'admin';
        });
    }
}