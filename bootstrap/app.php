<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Paths;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\RoleMiddleware;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    
    // <?php

    // use Illuminate\Foundation\Application;
    // use Illuminate\Foundation\Configuration\Middleware;
    // use Illuminate\Foundation\Configuration\Paths;
    // use Illuminate\Support\Facades\Route;
    
    // $app = new Application(dirname(__DIR__));
    
    // // Configure paths
    // $app->use(Paths::fromBasePath(base_path()));
    
    // // Register middleware
    // $app->use(Middleware::class)
    //     ->web()
    //     ->api();
    
    // // Register service providers
    // $app->providers->load([
    //     // Core service providers
    //     App\Providers\AppServiceProvider::class,
    //     App\Providers\AuthServiceProvider::class,
    //     App\Providers\EventServiceProvider::class,
    //     App\Providers\RouteServiceProvider::class,
    
    //     // Additional service providers
    //     App\Providers\AdminPanelServiceProvider::class, // For admin-specific functionality
    // ]);
    
    // // Define routes
    // Route::middleware('web')->group(function () {
    //     require __DIR__ . '/../routes/web.php';
    // });
    
    // Route::middleware('api')->prefix('api')->group(function () {
    //     require __DIR__ . '/../routes/api.php';
    // });
    
    // return $app;