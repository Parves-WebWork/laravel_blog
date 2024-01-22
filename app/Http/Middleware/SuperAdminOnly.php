<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the currently logged-in admin is a Super admin (status = 1)
        $loggedInUser = auth()->user();
        if ($loggedInUser && $loggedInUser->status === 1) {
            return $next($request);
        }

        // If the user is not a Super admin, redirect back to the 'admin.register' page with an error message.
        return redirect()->route('admin.register')->with('error', 'Access denied. Only Super admins can access this page.');
    }
}
