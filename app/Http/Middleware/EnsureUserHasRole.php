<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * * @param    $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->hasRole('super_admin')) {
            return $next($request);
        }
        if (!$request->user()->hasRole($role)) {
            return redirect(route('home'));
        }
        return $next($request);
    }
}
