<?php

namespace App\Providers\Middleware;

use Closure;
use Illuminate\Http\Request;
use Infrastructure\Http\Req;

class Initiate {
    public static array $headers = ['Cache-Control' => 'no-store, must-revalidate'];

    public function handle(Request $request, Closure $next) {
        Req::$r = $request;
        $resp = $next($request);
        if (method_exists($resp, 'header')) {
            foreach (self::$headers as $key => $value) {
                $resp->header($key, $value);
            }
        }
        return $resp;
    }
}
