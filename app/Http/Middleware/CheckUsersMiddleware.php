<?php

namespace Tradesys\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Tradesys\User;

class CheckUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->hasRole('admin')) {
            return '/admin';
        }

        return $next($request);

    }
}
