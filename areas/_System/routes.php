<?php

use Areas\_System\User\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/auth/login', 'login');
Route::patch('/user/language/{id}', [UserController::class, 'selectLanguage']);




