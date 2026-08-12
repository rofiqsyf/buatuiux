<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('kategori', 'semua');
        $year = $request->query('tahun');
        $search = $request->query('q');

        $query = Regulation::query();

        if ($category !== 'semua') {
            $query->where('category', $category);
        }

        if ($year) {
            $query->where('year', $year);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('sub_title', 'like', "%{$search}%");
            });
        }

        $regulations = $query->orderBy('year', 'desc')->paginate(10)->withQueryString();

        $counts = [
            'semua' => Regulation::count(),
            'uu' => Regulation::where('category', 'uu')->count(),
            'pp' => Regulation::where('category', 'pp')->count(),
            'perki' => Regulation::where('category', 'perki')->count(),
            'perda' => Regulation::where('category', 'perda')->count(),
            'internal' => Regulation::where('category', 'internal')->count(),
        ];

        return view('regulasi', compact('regulations', 'counts', 'category', 'year', 'search'));
    }
}
