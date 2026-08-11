<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockVisitorAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && ($user->hasRole('Visitor') || $user->role === 'Visitor' || $user->roles->isEmpty())) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied. Visitor accounts are not allowed to access the admin portal.',
            ], 403);
        }

        return $next($request);
    }
}
