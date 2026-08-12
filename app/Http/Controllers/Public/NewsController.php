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
        $items = collect([
            (object)['title' => 'Kunjungan Kerja Diskominfo', 'slug' => 'kunjungan-kerja-diskominfo', 'summary' => 'Diskominfo melakukan kunjungan kerja...', 'published_at' => now(), 'image_url' => null, 'category' => 'Kegiatan'],
            (object)['title' => 'Rapat Koordinasi Keterbukaan Informasi', 'slug' => 'rapat-koordinasi', 'summary' => 'Rapat koordinasi bersama PPID...', 'published_at' => now()->subDays(2), 'image_url' => null, 'category' => 'Rapat'],
            (object)['title' => 'Peluncuran Website Baru PPID', 'slug' => 'peluncuran-website', 'summary' => 'PPID meluncurkan website baru...', 'published_at' => now()->subDays(5), 'image_url' => null, 'category' => 'Berita'],
        ]);
        $newsList = new \Illuminate\Pagination\LengthAwarePaginator($items, 3, 6, 1, ['path' => request()->url()]);

        $dipDocs = collect([
            (object)['id' => 1, 'registration_number' => 'DIP-2025-01', 'title' => 'Laporan Kinerja 2025', 'year' => '2025', 'category' => 'berkala', 'file_path' => '#'],
            (object)['id' => 2, 'registration_number' => 'DIP-2024-02', 'title' => 'Renstra 2024-2029', 'year' => '2024', 'category' => 'berkala', 'file_path' => '#'],
        ]);

        $stats = [
            'total_docs' => 142,
            'berkala' => 45,
            'serta_merta' => 30,
            'setiap_saat' => 60,
            'dikecualikan' => 7,
        ];

        return view('berita-transparansi', compact('newsList', 'dipDocs', 'stats'));
    }

    public function show($slug)
    {
        $news = (object)[
            'title' => 'Berita Dummy: ' . str_replace('-', ' ', $slug),
            'content' => '<p>Ini adalah konten berita dummy untuk slug: ' . $slug . '. Karena ini versi Frontend-Only, database dinonaktifkan sehingga semua berita menampilkan teks ini.</p>',
            'published_at' => now(),
            'image' => null
        ];
        return view('berita-detail', compact('news'));
    }
}
