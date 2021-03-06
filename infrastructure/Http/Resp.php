<?php

namespace Infrastructure\Http;

use App\Providers\Middleware\Initiate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class Resp {
    public static function SQLJson(string $sql, $data = []): JsonResponse {
        return new JsonResponse(DB::select("
            SELECT json_agg(t) FROM ($sql) t
        ", $data)[0]->json_agg ?? '[]', json: true);
    }

    public static function SQLJsonSingle(string $sql, $data = []): JsonResponse {
        return new JsonResponse(DB::selectOne($sql, $data));
    }

    public static function hxRedirect(string $location, string $message = 'Redirect', int $code = 302):void {
        self::header('hx-redirect', $location);
        abort($code, $message);
    }

    public static function hxRefresh(string $message = 'Redirect', int $code = 302):void {
        self::header('hx-refresh', 'true');
        abort($code, $message);
    }

    public static function header(string $name, string $value): void {
        Initiate::$headers[$name] = $value;
    }
}
