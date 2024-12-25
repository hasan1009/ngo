<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CommonMiddleware;
use App\Http\Middleware\OnlineUser;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias(
            [
                'useradmin' => AdminMiddleware::class,
                'common' => CommonMiddleware::class,
                'OnlineUser' =>OnlineUser::class,
                
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
