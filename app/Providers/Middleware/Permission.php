<?php

namespace App\Providers\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Auth\Auth;

class Permission {
    public function handle(Request $request, Closure $next, string $permission) {
        if (!Auth::has_permission($permission)) {
            abort(403, 'No valid permission for route.');
        }
        return $next($request);
    }
}
