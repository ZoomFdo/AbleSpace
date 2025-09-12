<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccessibilitySettingsController;
use App\Http\Controllers\Api\CartProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategoryProductController;
use App\Http\Controllers\Api\CouponProductController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\OrderProductController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RoleUserController;
use App\Http\Controllers\AuthApi\RegisterController;
use App\Http\Controllers\AuthApi\LoginController;
use App\Http\Controllers\AuthApi\PasswordResetController;
use App\Http\Controllers\AuthApi\LogoutController;
use App\Http\Controllers\AuthApi\EmailVerificationController;

// Auth API для гостей
Route::prefix('v1/auth')->group(function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/password/email', [PasswordResetController::class, 'sendResetLink']);
    Route::post('/password/reset', [PasswordResetController::class, 'reset']);
    Route::get('/verify-email', [EmailVerificationController::class, 'verify']);
});

// Authenticated API (Sanctum)
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('/me', fn(Request $request) => $request->user());
    Route::post('/logout', [LogoutController::class, 'logout']);
    Route::post('/email/verify/resend', [EmailVerificationController::class, 'resend']);

    // CRUD ресурси
    Route::apiResource('accessibility-settings', AccessibilitySettingsController::class);
    Route::apiResource('cart-products', CartProductController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('category-products', CategoryProductController::class);
    Route::apiResource('coupon-products', CouponProductController::class);
    Route::apiResource('languages', LanguageController::class);
    Route::apiResource('order-products', OrderProductController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('role-users', RoleUserController::class);
});

