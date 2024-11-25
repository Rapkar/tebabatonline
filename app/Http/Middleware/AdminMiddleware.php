<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        
     
            if (Auth::check() &&  Auth::user()->hasRole('admin')) {
                Log::info('UserMiddleware executed', ['admin' => Auth::user()]);

                return $next($request);
            }
            $title = __("auth.Login");
            return response()->view('auth.login', compact('title'));

        

    }
}
