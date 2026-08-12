@extends('layouts.app')

@section('title', 'Tambah Regulasi')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.regulations.index') }}" class="inline-flex items-center gap-2 text-xs font-bold bg-white text-slate-700 hover:text-teal-600 border border-slate-200 hover:border-teal-200 px-4 py-2 rounded-xl transition shadow-sm group">
        <svg class="w-4 h-4 text-slate-400 group-hover:text-teal-600 transition transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali ke Daftar Regulasi</span>
    </a>
</div>

<div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm max-w-3xl">
    <h2 class="text-xl font-heading font-bold text-brand mb-6">Tambah Regulasi Baru</h2>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 text-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.regulations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 text-sm">
        @csrf
        
        <div>
            <label class="block text-slate-700 mb-1.5 font-semibold">Judul / Nomor Regulasi *</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Undang-Undang RI Nomor 14 Tahun 2008" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500 font-medium">
        </div>

        <div>
            <label class="block text-slate-700 mb-1.5 font-semibold">Tentang (Sub Judul) *</label>
            <input type="text" name="sub_title" value="{{ old('sub_title') }}" required placeholder="Contoh: Keterbukaan Informasi Publik" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-slate-700 mb-1.5 font-semibold">Kategori Regulasi *</label>
                <select name="category" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
                    <option value="uu" {{ old('category') == 'uu' ? 'selected' : '' }}>Undang-Undang (UU)</option>
                    <option value="pp" {{ old('category') == 'pp' ? 'selected' : '' }}>Peraturan Pemerintah (PP)</option>
                    <option value="perki" {{ old('category') == 'perki' ? 'selected' : '' }}>Peraturan Komisi Informasi (PERKI)</option>
                    <option value="perda" {{ old('category') == 'perda' ? 'selected' : '' }}>Peraturan Daerah (PERDA)</option>
                    <option value="internal" {{ old('category') == 'internal' ? 'selected' : '' }}>Peraturan Internal (SK/Direksi)</option>
                </select>
            </div>
            <div>
                <label class="block text-slate-700 mb-1.5 font-semibold">Tahun Regulasi *</label>
                <input type="number" name="year" value="{{ old('year', date('Y')) }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
            </div>
        </div>

        <div>
            <label class="block text-slate-700 mb-1.5 font-semibold">Upload Berkas PDF Regulasi (Maksimal 10MB)</label>
            <input type="file" name="file" accept=".pdf,.doc,.docx" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-slate-600 focus:outline-none focus:border-teal-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
        </div>

        <div class="pt-4 flex gap-3">
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-sm">Simpan Regulasi</button>
            <a href="{{ route('admin.regulations.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-5 py-2.5 rounded-xl font-semibold transition">Batal</a>
        </div>
    </form>
</div>
@endsection
