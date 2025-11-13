<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveRequestController;

Route::resource('users', UserController::class);

Route::resource('requests', LeaveRequestController::class);