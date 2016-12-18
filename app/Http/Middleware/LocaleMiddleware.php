<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;
use Log;

class LocaleMiddleware
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
        App::setLocale(Session::get('locale'));

        return $next($request);
    }
}
