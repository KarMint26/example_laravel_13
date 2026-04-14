<?php

use App\Http\Controllers\Admin\DashboardController as DashboardControllerAdmin;
use App\Http\Controllers\Employee\DashboardController as DashboardControllerEmployee;
use App\Http\Controllers\Engineer\DashboardController as DashboardControllerEngineer;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Employee\TicketController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('index');

Route::get('/dashboard-exm', function(){
    return view('admin_v.dashboard');
});

Route::prefix('auth')->group(function () {
    Route::middleware('guest')
        ->group(function () {
            Route::get('/login', [AuthController::class, 'login_g'])->name('auth.login_g');
            Route::post('/login', [AuthController::class, 'login_p'])->name('auth.login_p');

            Route::get('/register', [AuthController::class, 'register_g'])->name('auth.register_g');
            Route::post('/register', [AuthController::class, 'register_p'])->name('auth.register_p');
        });

    Route::middleware('auth')
        ->group(function () {
            Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
        });
});

// Admin
Route::middleware(['auth', 'role:Admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardControllerAdmin::class, 'index'])->name('admin.dashboard');
    });

// Engineer
Route::middleware(['auth', 'role:Engineer'])
    ->prefix('engineer')
    ->group(function () {
        Route::get('/dashboard', [DashboardControllerEngineer::class, 'index'])->name('engineer.dashboard');
    });

// Employee
Route::middleware(['auth', 'role:Employee'])
    ->prefix('employee')
    ->group(function () {
        Route::get('/dashboard', [DashboardControllerEmployee::class, 'index'])->name('employee.dashboard'); // /employee/dashboard

        Route::prefix('tickets')->group(function () {
            Route::get('/create', [TicketController::class, 'create_g'])->name('employee.ticket.create_g'); // /employee/tickets/create
            Route::post('/create', [TicketController::class, 'create_p'])->name('employee.ticket.create_p');
        });
    });
