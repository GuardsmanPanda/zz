<?php

namespace App\Providers\Middleware;

use Closure;
use Illuminate\Http\Request;

class HtmxBuster {
    public function handle(Request $request, Closure $next) {
        $a = $request->header('accept');
        if (str_contains($a, 'html') && !$request->header('HX-request') && $request->method() === 'GET') {
            return response()->view('layout', [
                'primary_hx' => 'hx-get="/' .trim($request->path(), '/') . '"',
                'area' => explode('/', ltrim($request->path(), '/'))[0],
            ]);
        }
        return $next($request);
    }
}
