<?php

use App\Http\Middleware\HandleAppearance;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use \Illuminate\Routing\Middleware\SubstituteBindings;
use \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);

        $middleware->web(append: [
            HandleAppearance::class,
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);

        // API middleware
        $middleware->api(append: [
        EnsureFrontendRequestsAreStateful::class, //SPA and token
        //  'throttle:api',
        SubstituteBindings::class,
    ]);

    $middleware->alias([
    'isAdmin' => \App\Http\Middleware\IsAdmin::class,
    ]);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
