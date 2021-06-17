<?php
use App\Tools\Translator;

if (!function_exists('t')) {
    function t(string $key): string {
        return Translator::translate($key);
    }
}

if (!function_exists('csrf_header')) {
    function csrf_header(): string {
        return "headers: {'X-CSRF-TOKEN': '".csrf_token()."' }";
    }
}
