<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;

Route::get('/test', function () {
    return response()->json(['message' => 'API works!']);
});

Route::prefix('v1')->group(function () {
    Route::get('/debug', function (Request $request) {
        return response()->json([
            'success' => true,
            'message' => 'Тест без auth',
            'user' => $request->user() ? 'Authenticated' : 'Not authenticated',
            'timestamp' => now()->toDateTimeString()
        ]);
    });

    Route::middleware(['log.auth', 'auth:sanctum'])->get('/me', function (Request $request) {
        try {
            $token = PersonalAccessToken::findToken($request->bearerToken());
            if (!$token) {
                return response()->json(['success' => false, 'message' => 'Invalid token'], 401);
            }
            $user = $token->tokenable;
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found'], 401);
            }
            return response()->json([
                'success' => true,
                'user_id' => $user->id, // changed to id
                'email' => $user->email,
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in /me', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    });
});