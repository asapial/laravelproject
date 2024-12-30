<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    }
}
