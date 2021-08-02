<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
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
        $locale = session('locale')
            ? session('locale')
            : $request->cookie('locale');

        if ($locale === null) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);
        session(['locale' => $locale]);

        $response = $next($request);
        $response->cookie('locale', $locale);

        return $response;
    }
}
