<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveRequestController;

Route::resource('user', UserController::class);
Route::resource('requests', LeaveRequestController::class);

Route::get('/', function () {
    return view('welcome'); // This loads the resources/views/welcome.blade.php file
});