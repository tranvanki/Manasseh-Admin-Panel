<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}