<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if(session()->has('applocale') && array_key_exists(session('applocale'), Config::get('language'))) {
            $locale = session('applocale');
        }
        else {
            $locale = 'sk';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
