<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VisitorLog extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'visited_date',
        'last_activity_at',
    ];

    protected $casts = [
        'visited_date' => 'date',
        'last_activity_at' => 'datetime',
    ];

    /**
     * Get aggregated visitor statistics.
     */
    public static function getStats(): array
    {
        $now = Carbon::now();
        $fiveMinutesAgo = $now->copy()->subMinutes(5);
        $todayStr = $now->toDateString();
        $startOfMonth = $now->copy()->startOfMonth()->toDateString();

        // 1. Online: unique IP active in last 5 minutes
        $online = static::where('last_activity_at', '>=', $fiveMinutesAgo)->count();

        // 2. Today: unique visitors today
        $today = static::where('visited_date', $todayStr)->count();

        // 3. Month: unique visitors this month
        $month = static::where('visited_date', '>=', $startOfMonth)->count();

        // 4. Total: total logged visits across all time
        $total = static::count();

        return [
            'online' => max(1, $online), // guarantee at least 1 online for current viewer
            'today' => max(1, $today),
            'month' => max(1, $month),
            'total' => max(1, $total),
        ];
    }
}
