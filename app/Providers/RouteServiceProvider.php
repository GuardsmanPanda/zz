<?php

namespace App\Providers;

use Areas\_System\AuthenticationController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {
    public function boot():void {
        $this->routes(function () {
            Route::middleware('web')->group(function() {
                Route::prefix('')->group(base_path('areas/_System/routes.php'));
                Route::prefix('admin')->middleware('permission:admin')->group(base_path('areas/_Admin/routes.php'));
            });

            Route::middleware(['cookie', 'session'])->get('auth/payload-login', [AuthenticationController::class, 'loginWithSignedPayload']);
            Route::middleware(['cookie', 'session'])->get('auth/logout', [AuthenticationController::class, 'logout']);

            Route::get('/test', function () {
                return 'test ok';
            });
        });
    }
}
