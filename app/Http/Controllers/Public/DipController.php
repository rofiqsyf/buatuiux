<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DipDocument;
use Illuminate\Http\Request;

class DipController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori', 'semua');
        $year = $request->query('tahun');
        $search = $request->query('q');

        $query = DipDocument::query();

        if ($category !== 'semua') {
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

        $documents = $query->orderBy('year', 'desc')->paginate(10)->withQueryString();

        $categoryCounts = [
            'semua' => DipDocument::count(),
            'berkala' => DipDocument::where('category', 'berkala')->count(),
            'serta-merta' => DipDocument::where('category', 'serta-merta')->count(),
            'setiap-saat' => DipDocument::where('category', 'setiap-saat')->count(),
            'dikecualikan' => DipDocument::where('category', 'dikecualikan')->count(),
        ];

        return view('informasi-publik', compact('documents', 'categoryCounts', 'category', 'year', 'search'));
    }

    public function download($id)
    {
        $doc = DipDocument::findOrFail($id);

        if ($doc->category === 'dikecualikan') {
            return redirect()->back()->with('error', 'Dokumen kategori Dikecualikan bersifat rahasia dan tidak dapat diunduh.');
        }

        $doc->increment('downloads_count');

        if ($doc->file_path && file_exists(storage_path('app/public/' . $doc->file_path))) {
            return response()->download(storage_path('app/public/' . $doc->file_path));
        }

        return redirect()->back()->with('info', 'Mengunduh dokumen: ' . $doc->title);
    }
}
