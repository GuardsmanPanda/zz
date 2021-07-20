<?php

namespace Infrastructure\Http;

use Illuminate\Support\Facades\DB;

class Data {
    public static function SQLToJson(string $sql, $data = []): string {
        return DB::select("
            SELECT json_agg(t) FROM ($sql) t
        ", $data)[0]->json_agg ?? '[]';
    }

    public static function jwtToArray(string $jwt): array {
        return json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $jwt)[1]))), true, 512, JSON_THROW_ON_ERROR);
    }
}
