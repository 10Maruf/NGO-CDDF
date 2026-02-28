<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * Reads the locale from the session and applies it.
     * Supported locales: en, bn
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = Session::get('locale', config('app.locale'));

        if (in_array($locale, ['en', 'bn'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
