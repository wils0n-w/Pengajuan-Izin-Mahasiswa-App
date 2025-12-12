<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.create_leave');
});

    // Admin Dashboard accessible by admin and faculty
    Route::get('/admin', function () {
        return view('layout.admin_dashboard');
    })->middleware(\App\Http\Middleware\CheckRole::class . ':admin,faculty')->name('admin.dashboard');

    // Routes accessible by admin and faculty
    Route::middleware(\App\Http\Middleware\CheckRole::class . ':admin,faculty')->group(function () {
        Route::resource('requests', \App\Http\Controllers\LeaveRequestController::class)->except(['store']);
        Route::put('/requests/{request}/status', [\App\Http\Controllers\LeaveRequestController::class, 'updateStatus'])->name('requests.update_status');
    });

    // Routes accessible only by admin
    Route::middleware(\App\Http\Middleware\CheckRole::class . ':admin')->group(function () {
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });

    Route::get('/test-middleware', function () {
        return 'Test Middleware is working!';
    })->middleware(\App\Http\Middleware\TestMiddleware::class);


Route::post('/requests', [\App\Http\Controllers\LeaveRequestController::class, 'store'])->name('requests.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
