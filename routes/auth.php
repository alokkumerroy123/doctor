<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

Route::redirect('/', '/dashboard', 301);

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => 'guest', 'as' => 'auth'], function(){
    Route::get('/login', [AuthController::class, 'get_login'])->name('.login.get');
    Route::post('/login', [AuthController::class, 'post_login'])->name('.login.post');
});
