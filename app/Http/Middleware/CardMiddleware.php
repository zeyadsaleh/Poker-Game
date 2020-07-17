<?php

namespace App\Http\Middleware;

use Closure;

class CardMiddleware
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
        if (!session()->has('card')) {
            return redirect('/');
        }
        return $next($request);
    }
}
