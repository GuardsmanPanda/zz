<?php

namespace Areas\_System\User;

use Illuminate\Routing\Controller;
use Infrastructure\Auth\Auth;
use Infrastructure\Http\Resp;
use Infrastructure\Language\LanguageUtility;
use Infrastructure\Language\Translator;

class UserController extends Controller {
    public function selectLanguage(string $id): void {
        Auth::user()->language_id = $id === 'reset' ? LanguageUtility::getAcceptedLanguage() : (int)$id;
        Auth::user()->save();
        Translator::setSessionLanguage(Auth::user());
        Resp::hxRefresh('Language chosen');
    }
}