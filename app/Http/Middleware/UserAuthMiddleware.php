<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // If user is not logged in, redirect to login page
        if (!session()->has('user')) {
            return redirect()->route('user.login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}
    