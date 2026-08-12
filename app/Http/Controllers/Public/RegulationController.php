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

        $items = collect([
            (object)['title' => 'UU Keterbukaan Informasi Publik', 'sub_title' => 'Undang-Undang No. 14 Tahun 2008', 'category' => 'uu', 'year' => '2008', 'file_path' => '#'],
            (object)['title' => 'PP Pelaksanaan UU KIP', 'sub_title' => 'Peraturan Pemerintah No. 61 Tahun 2010', 'category' => 'pp', 'year' => '2010', 'file_path' => '#'],
            (object)['title' => 'Perki Standar Layanan Informasi Publik', 'sub_title' => 'Peraturan Komisi Informasi No. 1 Tahun 2021', 'category' => 'perki', 'year' => '2021', 'file_path' => '#'],
        ]);

        if ($category !== 'semua') {
            $items = $items->where('category', $category);
        }

        if ($year) {
            $items = $items->where('year', $year);
        }

        if ($search) {
            $items = $items->filter(function ($item) use ($search) {
                return stripos($item->title, $search) !== false || stripos($item->sub_title, $search) !== false;
            });
        }

        $regulations = new \Illuminate\Pagination\LengthAwarePaginator($items, $items->count(), 10, 1, ['path' => request()->url()]);

        $counts = [
            'semua' => 15,
            'uu' => 3,
            'pp' => 2,
            'perki' => 5,
            'perda' => 3,
            'internal' => 2,
        ];

        return view('regulasi', compact('regulations', 'counts', 'category', 'year', 'search'));
    }
}
