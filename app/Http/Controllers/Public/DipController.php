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

        $items = collect([
            (object)['id' => 1, 'registration_number' => 'DIP-2025-01', 'title' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) 2025', 'category' => 'berkala', 'year' => '2025', 'file_path' => '#', 'downloads_count' => 10],
            (object)['id' => 2, 'registration_number' => 'DIP-2024-02', 'title' => 'Rencana Strategis (Renstra) 2024-2029', 'category' => 'berkala', 'year' => '2024', 'file_path' => '#', 'downloads_count' => 25],
            (object)['id' => 3, 'registration_number' => 'DIP-2025-03', 'title' => 'Dokumen Anggaran DPA 2025', 'category' => 'setiap-saat', 'year' => '2025', 'file_path' => '#', 'downloads_count' => 5],
            (object)['id' => 4, 'registration_number' => 'DIP-2025-04', 'title' => 'Informasi Bencana Alam', 'category' => 'serta-merta', 'year' => '2025', 'file_path' => '#', 'downloads_count' => 100],
            (object)['id' => 5, 'registration_number' => 'DIP-2025-05', 'title' => 'Dokumen Rahasia Negara', 'category' => 'dikecualikan', 'year' => '2025', 'file_path' => null, 'downloads_count' => 0],
        ]);

        if ($category !== 'semua') {
            $items = $items->where('category', $category);
        }

        if ($year) {
            $items = $items->where('year', $year);
        }

        if ($search) {
            $items = $items->filter(function ($item) use ($search) {
                return stripos($item->title, $search) !== false || stripos($item->registration_number, $search) !== false;
            });
        }

        $documents = new \Illuminate\Pagination\LengthAwarePaginator($items, $items->count(), 10, 1, ['path' => request()->url()]);

        $categoryCounts = [
            'semua' => 142,
            'berkala' => 45,
            'serta-merta' => 30,
            'setiap-saat' => 60,
            'dikecualikan' => 7,
        ];

        return view('informasi-publik', compact('documents', 'categoryCounts', 'category', 'year', 'search'));
    }

    public function download($id)
    {
        return redirect()->back()->with('info', 'Mengunduh dokumen (Fitur simulasi frontend-only, file asli tidak tersedia).');
    }
}
