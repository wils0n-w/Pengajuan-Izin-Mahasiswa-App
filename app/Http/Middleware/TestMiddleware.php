<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // For testing purposes, you could log something or add a header
        // \Log::info('TestMiddleware is working!');
        // $response = $next($request);
        // $response->headers->set('X-Test-Middleware', 'Passed');
        // return $response;

        // Or just allow the request to pass through
        return $next($request);
    }
}
