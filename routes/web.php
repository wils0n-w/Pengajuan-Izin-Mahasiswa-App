<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveRequestController;

Route::resource('users', UserController::class);
Route::resource('requests', LeaveRequestController::class);
Route::put('requests/{request}/update-status', [LeaveRequestController::class, 'updateStatus'])->name('requests.update_status');

Route::get('/admin', function () {
    return view('layout.admin_dashboard');
})->name('admin.dashboard');

Route::get('/', function () {
    return view('layout.index');
});

Route::get('users/create', [UserController::class, 'create'])->name('users.create');
