<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // Superadmin has access to everything
        if ($request->user()->isSuperAdmin()) {
            return $next($request);
        }

        $userRole = $request->user()->role ?? 'operator';

        // Check if role is in explicit allowed list
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Admin role also inherits operator privileges
        if (in_array('operator', $roles) && $userRole === 'admin') {
            return $next($request);
        }

        abort(403, 'Akses Ditolak: Anda tidak memiliki wewenang untuk fitur ini.');
    }
}
