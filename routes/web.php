<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveRequestController;

Route::resource('users', UserController::class);
Route::resource('requests', LeaveRequestController::class);

Route::get('/', function () {
    return view('layout/index'); // This loads the resources/views/layout/index.blade.php file
});

Route::get('users/create', [UserController::class, 'create'])->name('layout.create');