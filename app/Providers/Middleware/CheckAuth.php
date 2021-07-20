<?php

namespace App\Providers\Middleware;

use Areas\_System\Auth\Auth;
use Closure;

class CheckAuth {
    public function handle($request, Closure $next) {
        Auth::$user_id = session()->get('login_id', -1);
        if (Auth::$user_id === -1 && $request->path() !== '/game')
        return $next($request);
    }
}
