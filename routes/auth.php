<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

// Route::redirect('/', '/dashboard', 301);

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/frontend',[FrontendController::class,'index'])->name('frontend');



Route::group(['middleware' => 'guest', 'as' => 'auth'], function(){
    Route::get('/login', [AuthController::class, 'get_login'])->name('.login.get');
    Route::post('/login', [AuthController::class, 'post_login'])->name('.login.post');
});
