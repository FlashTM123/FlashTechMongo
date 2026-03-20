<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if language is set in URL parameter
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            if (in_array($locale, array_keys(config('locale.locales')))) {
                session()->put('locale', $locale);
                app()->setLocale($locale);
            }
        }

        // Check session for stored locale
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            // Use default locale
            app()->setLocale(config('locale.default'));
            session()->put('locale', config('locale.default'));
        }

        return $next($request);
    }
}
