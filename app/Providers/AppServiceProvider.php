<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tắt SSL verify cho Socialite (chỉ dùng cho development)
        if ($this->app->environment('local')) {
            \Illuminate\Support\Facades\Http::withoutVerifying();

            // Cấu hình Guzzle cho Socialite
            $this->app->bind(\GuzzleHttp\Client::class, function () {
                return new \GuzzleHttp\Client(['verify' => false]);
            });
        }
        if($this->app->environment('production')){
            URL::forceScheme('https');
        }
    }
}
