<?php

namespace App\Http\Middleware;

use Closure;

class OnlyUser
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
        if ($request->user())
        {
            if ($request->user()->hasRole('creator')) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
