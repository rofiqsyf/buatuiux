<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\DipDocument;
use App\Models\Regulation;
use App\Models\News;
use App\Models\InformationRequest;
use App\Models\ContactMessage;
use App\Http\Controllers\Public\RequestController;
use App\Http\Controllers\Public\TrackingController;

// Middleware for CORS on local frontend
Route::middleware('api')->group(function () {

    // 1. Home stats & latest news
    Route::get('/home-stats', function () {
        $latestNews = News::orderBy('published_at', 'desc')->take(3)->get();
        $stats = [
            'total_docs' => DipDocument::count(),
            'berkala' => DipDocument::where('category', 'berkala')->count(),
            'serta_merta' => DipDocument::where('category', 'serta-merta')->count(),
            'setiap_saat' => DipDocument::where('category', 'setiap-saat')->count(),
            'dikecualikan' => DipDocument::where('category', 'dikecualikan')->count(),
        ];

        return response()->json([
            'success' => true,
            'stats' => $stats,
            'latest_news' => $latestNews,
        ])->header('Access-Control-Allow-Origin', '*');
    });

    // 2. DIP Documents list & filtering
    Route::get('/dip-documents', function (Request $request) {
        $category = $request->query('kategori', 'semua');
        $year = $request->query('tahun');
        $search = $request->query('q');

        $query = DipDocument::query();

        if ($category !== 'semua' && $category) {
            $query->where('category', $category);
        }

        if ($year) {
            $query->where('year', $year);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('registration_number', 'like', "%{$search}%");
            });
        }

        $documents = $query->orderBy('year', 'desc')->get();

        $categoryCounts = [
            'semua' => DipDocument::count(),
            'berkala' => DipDocument::where('category', 'berkala')->count(),
            'serta-merta' => DipDocument::where('category', 'serta-merta')->count(),
            'setiap-saat' => DipDocument::where('category', 'setiap-saat')->count(),
            'dikecualikan' => DipDocument::where('category', 'dikecualikan')->count(),
        ];

        return response()->json([
            'success' => true,
            'category_counts' => $categoryCounts,
            'data' => $documents,
        ])->header('Access-Control-Allow-Origin', '*');
    });

    // 3. Regulations list
    Route::get('/regulations', function (Request $request) {
        $category = $request->query('kategori', 'semua');
        $search = $request->query('q');

        $query = Regulation::query();

        if ($category !== 'semua' && $category) {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('sub_title', 'like', "%{$search}%");
            });
        }

        $regulations = $query->orderBy('year', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $regulations,
        ])->header('Access-Control-Allow-Origin', '*');
    });

    // 4. News list
    Route::get('/news', function (Request $request) {
        $category = $request->query('kategori', 'semua');
        $search = $request->query('q');

        $query = News::query();

        if ($category !== 'semua' && $category) {
            $query->where('category', 'like', "%{$category}%");
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        $news = $query->orderBy('published_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $news,
        ])->header('Access-Control-Allow-Origin', '*');
    });

    // 5. Submit Information Request
    Route::post('/information-requests', [RequestController::class, 'store']);

    // 6. Track Ticket
    Route::post('/tracking', [TrackingController::class, 'search']);

    // 7. Submit Contact Message
    Route::post('/contact', [App\Http\Controllers\Public\ContactController::class, 'store']);

    // 8. Visitor Statistics API (Realtime Polling)
    Route::get('/visitor-stats', function () {
        return response()->json([
            'success' => true,
            'stats' => \App\Models\VisitorLog::getStats(),
        ])->header('Access-Control-Allow-Origin', '*');
    });

});
