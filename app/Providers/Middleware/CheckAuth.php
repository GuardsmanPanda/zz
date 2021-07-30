<?php

namespace App\Providers\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Auth\Auth;

class CheckAuth {
    public function handle(Request $request, Closure $next) {
        Auth::$user_id = session()->get('login_id', -1);
        if (Auth::$user_id === -1 && $request->path() !== '/game')
        return $next($request);
    }
}
