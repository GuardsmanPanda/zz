<?php

namespace App\Providers\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Auth\Auth;

class Permission {
    public function handle(Request $request, Closure $next, string $permission) {
        abort_unless(Auth::has_permission($permission), 403, 'No valid permission for route.');
        return $next($request);
    }
}
