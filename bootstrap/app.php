<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Daftar middleware global di sini jika mau

        // Tambahkan ini:
        $middleware->alias([
            // Tambahkan middleware route di sini
            'jwt.validate' => \App\Http\Middleware\JwtValidate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        
    })->create();
