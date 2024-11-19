<?php

use App\Http\Middleware\Is_admin;
use App\Http\Middleware\Is_user;
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

        $middleware->alias(
            [
                'is_admin' => Is_admin::class,
                'is_user' => Is_user::class
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();