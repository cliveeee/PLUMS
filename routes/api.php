<?php

use App\Http\Controllers\MobileApiController;
use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function() {
    Route::post('/mobile/login', [MobileApiController::class, 'login'])->name('mobile.login');
    Route::post('/mobile/register', [MobileApiController::class, 'register'])->name('mobile.register');
    Route::get('/quizzes', [QuizController::class, 'index']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/mobile/logout', [MobileApiController::class, 'logout'])->name('mobile.logout');
        Route::get('/mobile/me', [MobileApiController::class, 'currentUser'])->name('mobile.me');
    });


});
