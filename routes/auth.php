<?php

use App\Http\Controllers\AuthWeb\AuthenticatedSessionController;
use App\Http\Controllers\AuthWeb\ConfirmablePasswordController;
use App\Http\Controllers\AuthWeb\EmailVerificationNotificationController;
use App\Http\Controllers\AuthWeb\EmailVerificationPromptController;
use App\Http\Controllers\AuthWeb\NewPasswordController;
use App\Http\Controllers\AuthWeb\PasswordResetLinkController;
use App\Http\Controllers\AuthWeb\RegisteredUserController;
use App\Http\Controllers\AuthWeb\VerifyEmailController;

use App\Http\Controllers\AuthApi\RegisterController;
use App\Http\Controllers\AuthApi\LoginController;
use App\Http\Controllers\AuthApi\LogoutController;
use App\Http\Controllers\AuthApi\PasswordResetController;
use App\Http\Controllers\AuthApi\EmailVerificationController;
use Illuminate\Support\Facades\Route;

// API Authentication Routes

// API routes for guest
Route::prefix('api')->middleware('guest')->group(function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);

    Route::post('/password/email', [PasswordResetController::class, 'sendResetLink']);
    Route::post('/password/reset', [PasswordResetController::class, 'reset']);
});

// API routes for authentificated user (Sanctum)
Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout']);
    Route::get('/me', function (\Illuminate\Http\Request $request) {
        return $request->user();
    });

    Route::post('/email/verify/resend', [EmailVerificationController::class, 'resend']);
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->name('verification.verify');
});


// Web Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('throttle:6,1');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
