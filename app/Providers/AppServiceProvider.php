<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EmployeeMiddleware;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot():void
    {
        Route::middlewareGroup('admin', [AdminMiddleware::class]);
        Route::middlewareGroup('employee', [EmployeeMiddleware::class]);
        Paginator::useBootstrap();

    }
}
