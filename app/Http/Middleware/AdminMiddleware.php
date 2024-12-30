<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the usertype 'admin'
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request);
        }

        // Redirect non-admin users to the login page
        return redirect('/login')->with('error', 'Access denied.');
    }


}
