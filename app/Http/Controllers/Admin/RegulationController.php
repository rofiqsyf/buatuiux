<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');
        $category = $request->query('category');
        $query = Regulation::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('sub_title', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('category', $category);
        }

        $regulations = $query->orderBy('year', 'desc')->paginate(10)->withQueryString();

        return view('admin.regulations.index', compact('regulations', 'search', 'category'));
    }

    public function create()
    {
        return view('admin.regulations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'category' => 'required|in:uu,pp,perki,perda,internal',
            'year' => 'required|integer',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('regulations', 'public');
        }

        Regulation::create($validated);

        return redirect()->route('admin.regulations.index')->with('success', 'Regulasi berhasil ditambahkan.');
    }

    public function edit(Regulation $regulation)
    {
        return view('admin.regulations.edit', compact('regulation'));
    }

    public function update(Request $request, Regulation $regulation)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'category' => 'required|in:uu,pp,perki,perda,internal',
            'year' => 'required|integer',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('regulations', 'public');
        }

        $regulation->update($validated);

        return redirect()->route('admin.regulations.index')->with('success', 'Regulasi berhasil diperbarui.');
    }

    public function destroy(Regulation $regulation)
    {
        $regulation->delete();
        return redirect()->route('admin.regulations.index')->with('success', 'Regulasi berhasil dihapus.');
    }
}
