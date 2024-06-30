<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ReferralCheck
{
    public function handle($request, Closure $next)
    {
        // Check if the request origin matches the specific website
        $origin = $request->headers->get('Origin');
        if ($origin === 'https://tenderplus.id') {
            // If the origin is tenderplus.id, allow access without login
            return $next($request);
        }

        // If not referred from tenderplus.id, check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to the login page
            return redirect()->route('login');
        }

        return $next($request);
    }
}
