<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessibilitySettingsController;
use App\Http\Controllers\CartProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CouponProductController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('accessibility-settings', AccessibilitySettingsController::class);
Route::apiResource('cart-products', CartProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('category-products', CategoryProductController::class);
Route::apiResource('coupon-products', CouponProductController::class);
Route::apiResource('languages', LanguageController::class);
Route::apiResource('order-products', OrderProductController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('role-users', RoleUserController::class);
