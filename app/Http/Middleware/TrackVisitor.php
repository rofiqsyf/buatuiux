<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Track only GET requests to public pages (ignore AJAX asset/storage requests)
            if ($request->isMethod('GET') && !$request->expectsJson() && !$request->is('storage/*') && !$request->is('assets/*')) {
                $ip = $request->ip() ?: '127.0.0.1';
                $agent = substr($request->userAgent() ?: 'Unknown', 0, 500);
                $today = Carbon::today()->toDateString();
                $now = Carbon::now();

                VisitorLog::updateOrCreate(
                    [
                        'ip_address' => $ip,
                        'visited_date' => $today,
                    ],
                    [
                        'user_agent' => $agent,
                        'last_activity_at' => $now,
                    ]
                );
            }
        } catch (\Exception $e) {
            // Silently catch exception so middleware never breaks request flow
            Log::error('TrackVisitor Middleware error: ' . $e->getMessage());
        }

        return $next($request);
    }
}
