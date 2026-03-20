<?php

if (!function_exists('get_available_locales')) {
    /**
     * Get available locales
     */
    function get_available_locales()
    {
        return config('locale.locales');
    }
}

if (!function_exists('get_current_locale')) {
    /**
     * Get current locale
     */
    function get_current_locale()
    {
        return session()->get('locale', config('locale.default'));
    }
}

if (!function_exists('is_locale')) {
    /**
     * Check if current locale matches given locale
     */
    function is_locale($locale)
    {
        return get_current_locale() === $locale;
    }
}

if (!function_exists('locale_name')) {
    /**
     * Get locale display name
     */
    function locale_name($locale = null)
    {
        $locale = $locale ?? get_current_locale();
        return config("locale.locales.{$locale}.name", $locale);
    }
}

if (!function_exists('locale_flag')) {
    /**
     * Get locale flag emoji
     */
    function locale_flag($locale = null)
    {
        $locale = $locale ?? get_current_locale();
        return config("locale.locales.{$locale}.flag", '');
    }
}
