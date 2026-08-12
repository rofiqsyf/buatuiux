<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\DipDocument;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::orderBy('published_at', 'desc')->paginate(6);

        $dipDocs = DipDocument::orderBy('year', 'desc')->take(5)->get();

        $stats = [
            'total_docs' => DipDocument::count(),
            'berkala' => DipDocument::where('category', 'berkala')->count(),
            'serta_merta' => DipDocument::where('category', 'serta-merta')->count(),
            'setiap_saat' => DipDocument::where('category', 'setiap-saat')->count(),
            'dikecualikan' => DipDocument::where('category', 'dikecualikan')->count(),
        ];

        return view('berita-transparansi', compact('newsList', 'dipDocs', 'stats'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('berita-detail', compact('news'));
    }
}
