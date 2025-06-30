<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->prependToGroup('web', \Illuminate\Session\Middleware\StartSession::class);
        $middleware->prependToGroup('web', \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);
        $middleware->prependToGroup('web', \Illuminate\Cookie\Middleware\EncryptCookies::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
