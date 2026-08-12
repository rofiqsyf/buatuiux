@extends('layouts.app')

@section('title', 'Kelola Regulasi & Hukum')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-heading font-bold text-brand">Kelola Regulasi & Payung Hukum KIP (Keterbukaan Informasi Publik)</h2>
        <p class="text-sm text-slate-500 mt-1">Daftar Undang-Undang, Peraturan Pemerintah, PERKI, PERDA, dan Peraturan Internal Direksi</p>
    </div>
    @if(!auth()->check() || !auth()->user()->isPimpinan())
    <a href="{{ route('admin.regulations.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-bold transition text-sm shadow-sm flex items-center gap-2">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
        Tambah Regulasi Baru
    </a>
    @endif
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <!-- Search & Category Filters -->
    <div class="p-4 bg-slate-50/50 border-b border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3">
        <form action="{{ route('admin.regulations.index') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
            <input type="hidden" name="category" value="{{ $category }}">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari judul atau nomor regulasi..." class="bg-white border border-slate-300 rounded-xl px-4 py-2 text-xs text-slate-700 focus:outline-none focus:border-teal-500 w-full sm:w-72">
            <button type="submit" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs px-4 py-2 rounded-xl font-semibold transition">Cari</button>
            @if($search)
            <a href="{{ route('admin.regulations.index', ['category' => $category]) }}" class="text-xs text-slate-500 hover:text-slate-700">Reset</a>
            @endif
        </form>

        <div class="flex items-center gap-1 overflow-x-auto w-full sm:w-auto text-xs no-scrollbar">
            <a href="{{ route('admin.regulations.index', ['q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ empty($category) ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">Semua</a>
            <a href="{{ route('admin.regulations.index', ['category' => 'uu', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'uu' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">UU</a>
            <a href="{{ route('admin.regulations.index', ['category' => 'pp', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'pp' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">PP</a>
            <a href="{{ route('admin.regulations.index', ['category' => 'perki', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'perki' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">PERKI</a>
            <a href="{{ route('admin.regulations.index', ['category' => 'perda', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'perda' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">PERDA</a>
            <a href="{{ route('admin.regulations.index', ['category' => 'internal', 'q' => $search]) }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ $category === 'internal' ? 'bg-teal-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-200' }}">Internal</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">Nomor & Judul Regulasi</th>
                    <th class="px-6 py-4">Tentang (Sub Judul)</th>
                    <th class="px-6 py-4">Kategori & Tahun</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($regulations as $reg)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="px-6 py-4">
                        <div class="font-bold text-brand text-sm">{{ $reg->title }}</div>
                        @if($reg->file_path)
                        <a href="{{ asset('storage/' . $reg->file_path) }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-semibold text-teal-600 hover:text-teal-700 mt-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Buka Berkas PDF Regulasi
                        </a>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-slate-600 text-xs leading-relaxed max-w-xs truncate" title="{{ $reg->sub_title }}">
                        {{ $reg->sub_title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="bg-teal-50 text-teal-700 border border-teal-100 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase">{{ $reg->category }}</span>
                        <span class="text-xs text-slate-500 font-semibold ml-1">Tahun {{ $reg->year }}</span>
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        @if(!auth()->check() || !auth()->user()->isPimpinan())
                            <a href="{{ route('admin.regulations.edit', $reg->id) }}" class="text-teal-600 hover:text-teal-700 mr-3 text-xs font-bold uppercase tracking-wider">Edit</a>
                            @if(!auth()->check() || auth()->user()->isAdmin())
                            <form action="{{ route('admin.regulations.destroy', $reg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus regulasi ini?');">
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
                    <td colspan="4" class="px-6 py-8 text-center text-slate-500">Belum ada regulasi yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($regulations->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $regulations->links() }}
    </div>
    @endif
</div>
@endsection
