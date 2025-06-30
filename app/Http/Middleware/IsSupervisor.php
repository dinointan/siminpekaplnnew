<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSupervisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    $allowedRoles = ['admin', 'owner', 'supervisor'];
    $userRole = strtolower(trim($request->user()->role));

    if (in_array($userRole, $allowedRoles)) {
        return $next($request);
    }

    return redirect()->route('dashboard')->with('status', 'Kamu tidak memiliki akses');
}

}
