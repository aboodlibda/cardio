<?php

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
        //
        $middleware->alias([

            'limit_request'=>LimitRequest::class,
            'authenticated'=>\App\Http\Middleware\Authenticated::class,

        ]);
//        $middleware->redirectGuestsTo(function ($request) {
//            if (!$request->expectsJson()) {
//                if (in_array('auth:user', $request->route()->middleware())) {
//                    if (!auth('user')->check()) {
//                        return route('sign-in');
//                    }
//                }
//            }
//        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //

    })->create();
