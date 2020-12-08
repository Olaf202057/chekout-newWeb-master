<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FirebaseAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Todo: Check the session for authentication tokens
        Log::Info(session()->all());
        if (session()->has('firebase_id_token')) {
            // Todo: Verify it.
            // Todo: If it isn't verified, try to refresh it, if it can't be refreshed, remove all references and don't allow them into the authorized ares, redirect home
            Log::Info(session('firebase_id_token'));
            return $next($request);
        }
        return redirect(route('home'));
    }
}
