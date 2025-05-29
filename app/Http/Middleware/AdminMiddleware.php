<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        // Check if user has admin privileges (user_type >= 2)
        $user = Auth::user();
        if ($user->user_type < 2) {
            abort(403, 'Administrator privileges required to access this area.');
        }

        return $next($request);
    }
}
