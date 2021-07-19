<?php

use Areas\_System\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'login');
Route::patch('/user/language/{id}', [UserController::class, 'selectLanguage']);




