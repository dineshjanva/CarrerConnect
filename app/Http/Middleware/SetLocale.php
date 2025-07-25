<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('app_locale', config('app.locale'));
        App::setLocale($locale);
        return $next($request);
    }

}