<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // http
        if (Auth::guard($guard)->check()) {
            return redirect()->route('demo.home');
        }

        if (Auth::guard($guard)->check()) {
            return response()->json(['status' => 'error', 'message' => 'already logged in'], 403);
        }

        return $next($request);
    }
}
