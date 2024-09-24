<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if (Auth::user()->hasRole('admin')){
                return $next($request);
            } else {
                \Log::warning('Unauthorized access attempt by ' . Auth::user()->email);
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'You are not an admin');
            }
        }

        if ($request->route()->getName() !== 'admin.login'){
            return redirect()->route('admin.login')->with('error', 'Please login as admin');
        }

        return $next($request);
    }
}
