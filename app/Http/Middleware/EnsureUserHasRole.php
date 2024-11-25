<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$roles): Response
    {
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            // Redirect or abort if the user does not have the required role
            return redirect('/home')->with('error', 'You do not have access to this resource.');
        }
        $title = __("auth.Login");
        return response()->view('auth.login', compact('title'));
    }

}
