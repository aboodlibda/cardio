<?php

use App\Http\Middleware\Authenticated;
use App\Http\Middleware\LimitRequest;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'limit_request' => LimitRequest::class,
            'authenticated' => Authenticated::class,
        ]);

        $middleware->redirectTo(function ($request){
            if (!$request->expectsJson()) {
                if (auth()->guard('user')) {
                    return route('show-login');
                }
            }
        });
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //

    })->create();
