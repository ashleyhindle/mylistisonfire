<?php

namespace App\Http\Middleware;

use Closure;

class KeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        $key = $request->header('x-api-key');
        if (empty($key)) {
            return response()->json([
                'error' => 'Empty key'
            ]);
        }

        $key = \App\Key::where('key', $key)->first();

        if (empty($key)) {
            return response()->json([
                'error' => 'Invalid key'
            ]);
        }

        $_GET['key_id'] = $key->id;

        return $next($request);
    }
}
