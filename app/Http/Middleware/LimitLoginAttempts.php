<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FRequest;

use Illuminate\Support\Facades\Log;

class LimitLoginAttempts
{
    protected $maxAttempts = 5;
    protected $decayMinutes = 15;

    public function handle(Request $request, Closure $next)
    {
        $ipAddress = FRequest::ip();
        $key = 'alogin_attempts:' . $ipAddress;
        // if (Cache::has($key) && Cache::get($key) >= $this->maxAttempts) {
        //     return response()->json(['message' => 'Too many login attempts. Please try again later.'], 429);
        // }

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $ipAddress = FRequest::ip();
        $key = 'alogin_attempts:' . $ipAddress;
        if ($response->status() == 200) {
            if (!Cache::has($key)) {
                // If it doesn't exist, set it with an initial value of 1 and an expiration time
                Cache::put($key, 1, now()->addMinutes($this->decayMinutes));
            } else {
                // If it exists, increment the value
                Cache::increment($key);
            }
        }
 
    }
}
