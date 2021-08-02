<?php

namespace Infrastructure\Http;

use Illuminate\Http\Request;

class Req {
    public static Request $r;

    public static function header(string $name): string|array|null {
        return self::$r->header($name);
    }

    public static function input(string $name = null, mixed $default = null): mixed {
        return self::$r->input($name, $default);
    }

    public static function method(): string {
        return self::$r->method();
    }

    public static function path(): string {
        return self::$r->path();
    }

    public static function content(): string {
        return self::$r->getContent();
    }

    public static function ip(): string {
        return self::header('CF_CONNECTING_IP') ?? self::$r->ip();
    }

    public static function ipCountry(): string {
        return self::header('CF_IPCOUNTRY') ?? 'XX';
    }

    public static function isWriteRequest(): bool {
        $m = self::$r->method();
        return $m !== 'GET' && $m !== 'HEAD';
    }
}
