<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == '1') {
                return $next($request);
            } else {
                return redirect('/')->with('status', 'Access denied! as you are not an admin');
            }
        } else {
            return redirect('/')->with('status', ' pleaselogin first');
        }
    }
}
