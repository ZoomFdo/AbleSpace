<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('Before auth middleware', [
            'token' => $request->bearerToken(),
            'bindings_count' => count(app()->getBindings())
        ]);

        return $next($request);
    }
}