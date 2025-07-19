<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Admin Handler user or not
        if (!Auth::check()) {
            return redirect()->route('Auth.login'); 
        }
        
        if (!Auth::user()->hasRole('admin')) {
            // abort(403, 'Unauthorized access. Admins only.');
            return redirect()->route('Auth.login'); 
        }
        
        return $next($request);
    }
}