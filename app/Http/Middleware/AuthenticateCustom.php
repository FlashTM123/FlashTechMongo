<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AuthenticateCustom extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Check if this is a customer route
            if ($this->isCustomerRoute($request)) {
                return route('customers.login');
            }

            // Default admin login
            return '/admin/login';
        }

        return null;
    }

    /**
     * Check if this is a customer route
     */
    protected function isCustomerRoute(Request $request): bool
    {
        return $request->is('gio-hang*') ||
               $request->is('thanh-toan*') ||
               $request->is('don-hang*') ||
               $request->is('profile*') ||
               $request->is('ho-so-ca-nhan*') ||
               $request->is('chinh-sua-ho-so*') ||
               $request->is('doi-mat-khau*') ||
               $request->is('yeu-thich*');
    }
}
