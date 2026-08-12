<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DipDocument;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = collect([
            (object)[
                'title' => 'Kunjungan Kerja Diskominfo',
                'slug' => 'kunjungan-kerja-diskominfo',
                'summary' => 'Diskominfo melakukan kunjungan kerja dalam rangka peningkatan layanan publik...',
                'published_at' => now(),
                'image_url' => null,
                'category' => 'Kegiatan'
            ],
            (object)[
                'title' => 'Rapat Koordinasi Keterbukaan Informasi',
                'slug' => 'rapat-koordinasi',
                'summary' => 'Rapat koordinasi bersama PPID pelaksana seluruh instansi untuk membahas transparansi...',
                'published_at' => now()->subDays(2),
                'image_url' => null,
                'category' => 'Rapat'
            ]
        ]);

        $stats = [
            'total_docs' => 142,
            'berkala' => 45,
            'serta_merta' => 30,
            'setiap_saat' => 60,
            'dikecualikan' => 7,
        ];

        return view('home', compact('latestNews', 'stats'));
    }

    public function profil()
    {
        return view('profil.index');
    }

    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function tugasFungsi()
    {
        return view('profil.tugas-fungsi');
    }

    public function strukturOrganisasi()
    {
        return view('profil.struktur-organisasi');
    }

    public function maklumatPelayanan()
    {
        return view('profil.maklumat-pelayanan');
    }

    public function prosedurLayanan()
    {
        return view('prosedur-layanan');
    }

    public function layanan()
    {
        return view('layanan');
    }
}
