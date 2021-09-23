<?php

use Illuminate\Support\Str;
use Infrastructure\Language\Translator;

function t(string $key): string {
    return Translator::translate($key);
}

function idempotency(string $value = null): string {
    return '<input hidden name="_idempotency" value="'. ($value ?? Str::random()) .'">';
}

function csrf_header(): string {
    return "headers: {'X-CSRF-TOKEN': '".csrf_token()."' }";
}

