<?php

use Areas\_System\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;


Route::get('auth/payload-login', [AuthenticationController::class, 'loginWithSignedPayload']);
Route::get('auth/login',[AuthenticationController::class, 'getLoginView']);
Route::get('auth/logout', [AuthenticationController::class, 'logout']);