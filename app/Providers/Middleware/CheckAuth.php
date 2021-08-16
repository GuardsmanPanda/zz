<?php

namespace App\Providers\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Auth\Auth;
use Infrastructure\Http\Req;

class CheckAuth {
    public function handle(Request $request, Closure $next) {
        if (Req::isWriteRequest()) { // Check CSRF token if applicable.
            $token = $request->input('_csrf-token')
                ?? $request->header('X-CSRF-TOKEN')
                ?? $request->header('X-XSRF-TOKEN');
            abort_unless(hash_equals($request->session()->token(), $token), 403, 'Invalid CSRF Token');
        }

        Auth::$user_id = session()->get('login_id', -1);
        if (Auth::$user_id === -1) {
            return redirect('/auth/login');
        }
        return $next($request);
    }
}
