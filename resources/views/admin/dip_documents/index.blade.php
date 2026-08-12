@extends('layouts.app')

@section('title', 'Kelola Dokumen DIP')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-heading font-bold text-brand">Kelola Dokumen DIP (Daftar Informasi Publik)</h2>
        <p class="text-sm text-slate-500 mt-1">Kelola arsip dokumen informasi publik berkala, serta merta, setiap saat, dan dikecualikan</p>
    </div>
    @if(!auth()->check() || !auth()->user()->isPimpinan())
    <a href="{{ route('admin.dip-documents.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-bold transition text-sm shadow-sm flex items-center gap-2">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
        Tambah Dokumen DIP
    </a>
    @endif
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <!-- Filter & Search Header -->
    <div class="p-4 bg-slate-50/50 border-b border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3">
        <form action="{{ route('admin.dip-documents.index') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
            <input type="hidden" name="category" value="{{ $category }}">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari judul atau no. registrasi..." class="bg-white border border-slate-300 rounded-xl px-4 py-2 text-xs text-slate-700 focus:outline-none focus:border-teal-500 w-full sm:w-72">
            <button type="submit" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs px-4 py-2 rounded-xl font-semibold transition">Cari</button>
            @if($search)
            <a href="{{ route('admin.dip-documents.index', ['category' => $category]) }}" class="text-xs text-slate-500 hover:text-slate-700">Reset</a>
            @endif
        </form>

        <!-- Category Filters -->
        <div class="flex items-center gap-1 overflow-x-auto w-full sm:w-auto text-xs no-scrollbar">
            <a href="{{ route('admin.dip-documents.index', ['q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ empty($category) ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">Semua</a>
            <a href="{{ route('admin.dip-documents.index', ['category' => 'berkala', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'berkala' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">Berkala</a>
            <a href="{{ route('admin.dip-documents.index', ['category' => 'serta-merta', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'serta-merta' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">Serta Merta</a>
            <a href="{{ route('admin.dip-documents.index', ['category' => 'setiap-saat', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'setiap-saat' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">Setiap Saat</a>
            <a href="{{ route('admin.dip-documents.index', ['category' => 'dikecualikan', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'dikecualikan' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">Dikecualikan</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">No. Registrasi</th>
                    <th class="px-6 py-4">Judul Dokumen</th>
                    <th class="px-6 py-4">Kategori Klasifikasi</th>
                    <th class="px-6 py-4">Tahun & Ukuran</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($documents as $doc)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="px-6 py-4 font-mono text-teal-600 font-bold text-xs">{{ $doc->registration_number }}</td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-brand text-sm">{{ $doc->title }}</div>
                        @if($doc->file_path)
                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-semibold text-teal-600 hover:text-teal-700 mt-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Buka / Download Berkas
                        </a>
                        @endif
                    </td>
                    <td class="px-6 py-4 capitalize">
                        @if($doc->category === 'berkala')
                            <span class="bg-teal-50 text-teal-700 border border-teal-100 text-xs px-2.5 py-0.5 rounded-full font-semibold">Informasi Berkala</span>
                        @elseif($doc->category === 'serta-merta')
                            <span class="bg-blue-50 text-blue-700 border border-blue-100 text-xs px-2.5 py-0.5 rounded-full font-semibold">Serta Merta</span>
                        @elseif($doc->category === 'setiap-saat')
                            <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 text-xs px-2.5 py-0.5 rounded-full font-semibold">Setiap Saat</span>
                        @else
                            <span class="bg-rose-50 text-rose-700 border border-rose-100 text-xs px-2.5 py-0.5 rounded-full font-semibold">Dikecualikan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-xs text-slate-500 whitespace-nowrap">
                        <div><strong class="text-slate-700">{{ $doc->year }}</strong></div>
                        <span class="text-[11px] text-slate-400">{{ $doc->file_size ?? '-' }}</span>
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        @if(!auth()->check() || !auth()->user()->isPimpinan())
                            <a href="{{ route('admin.dip-documents.edit', $doc->id) }}" class="text-teal-600 hover:text-teal-700 mr-3 text-xs font-bold uppercase tracking-wider">Edit</a>
                            @if(!auth()->check() || auth()->user()->isAdmin())
                            <form action="{{ route('admin.dip-documents.destroy', $doc->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-bold uppercase tracking-wider">Hapus</button>
                            </form>
                            @endif
                        @else
                            <span class="text-xs text-slate-400 italic">Hanya lihat</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-slate-500">Belum ada dokumen DIP yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($documents->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $documents->links() }}
    </div>
    @endif
</div>
@endsection
