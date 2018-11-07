<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('applocale') and array_key_exists(session('applocale'), config('languages'))) {
            $configLanguage = config('languages')[session('applocale')];
            setlocale(LC_TIME, $configLanguage[1] . '.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(session('applocale'));

        } else {
            session()->put('applocale', 'en');
            setlocale(LC_TIME, 'en_EN.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(config('app.fallback_locale'));

        }
        return $next($request);
    }
}
