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
        $latestNews = News::orderBy('published_at', 'desc')->take(2)->get();

        $stats = [
            'total_docs' => DipDocument::count(),
            'berkala' => DipDocument::where('category', 'berkala')->count(),
            'serta_merta' => DipDocument::where('category', 'serta-merta')->count(),
            'setiap_saat' => DipDocument::where('category', 'setiap-saat')->count(),
            'dikecualikan' => DipDocument::where('category', 'dikecualikan')->count(),
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
