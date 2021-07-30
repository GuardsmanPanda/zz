<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {
    public function boot():void {
        $this->routes(function () {
            Route::middleware('web')->group(function() {
                Route::prefix('')->group(base_path('areas/_System/routes.php'));
                Route::prefix('admin')->middleware('permission:admin')->group(base_path('areas/_Admin/routes.php'));
                Route::prefix('dev')->middleware('permission:dev')->group(base_path('areas/_Dev/routes.php'));

                Route::get('/test', function () {
                    return 'test ok';
                });
            });


            Route::middleware(['cookie', 'session'])->group(function() {
                Route::prefix('')->group(base_path('areas/_System/routes_public.php'));
            });
        });
    }
}
