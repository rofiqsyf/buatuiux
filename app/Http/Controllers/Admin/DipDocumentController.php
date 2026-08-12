<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DipDocument;
use Illuminate\Http\Request;

class DipDocumentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');
        $category = $request->query('category');
        $query = DipDocument::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('registration_number', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('category', $category);
        }

        $documents = $query->orderBy('year', 'desc')->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.dip_documents.index', compact('documents', 'search', 'category'));
    }

    public function create()
    {
        return view('admin.dip_documents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255|unique:dip_documents',
            'category' => 'required|in:berkala,serta-merta,setiap-saat,dikecualikan',
            'year' => 'required|integer',
            'file_size' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240', // 10MB max
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('dip_documents', 'public');
            if (empty($validated['file_size'])) {
                $size = $request->file('file')->getSize();
                $validated['file_size'] = number_format($size / 1048576, 2) . ' MB';
            }
        }

        DipDocument::create($validated);

        return redirect()->route('admin.dip-documents.index')->with('success', 'Dokumen DIP berhasil ditambahkan.');
    }

    public function edit(DipDocument $dipDocument)
    {
        return view('admin.dip_documents.edit', compact('dipDocument'));
    }

    public function update(Request $request, DipDocument $dipDocument)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255|unique:dip_documents,registration_number,' . $dipDocument->id,
            'category' => 'required|in:berkala,serta-merta,setiap-saat,dikecualikan',
            'year' => 'required|integer',
            'file_size' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('dip_documents', 'public');
            if (empty($validated['file_size'])) {
                $size = $request->file('file')->getSize();
                $validated['file_size'] = number_format($size / 1048576, 2) . ' MB';
            }
        }

        $dipDocument->update($validated);

        return redirect()->route('admin.dip-documents.index')->with('success', 'Dokumen DIP berhasil diperbarui.');
    }

    public function destroy(DipDocument $dipDocument)
    {
        $dipDocument->delete();
        return redirect()->route('admin.dip-documents.index')->with('success', 'Dokumen DIP berhasil dihapus.');
    }
}
