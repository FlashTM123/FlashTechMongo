<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
        $middleware->trustProxies('*');
        $middleware->redirectGuestsTo(function ($request) {
            if ($request->is('thanh-toan*') || $request->is('gio-hang*') || $request->is('don-hang*') || $request->is('chinh-sua-ho-so*') || $request->is('doi-mat-khau*') || $request->is('yeu-thich*') || $request->is('ho-so-ca-nhan*')) {
                return route('customers.login');
            }
            return '/admin/login';
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
