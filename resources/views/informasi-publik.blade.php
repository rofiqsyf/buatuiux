@extends('layouts.public')

@section('title', 'Daftar Informasi Publik (DIP) - PT Bhakti Husada Wonosobo')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <!-- Breadcrumbs -->
        <nav class="flex items-center justify-center sm:justify-start gap-2 text-xs text-slate-300 mb-3">
            <a href="{{ route('home') }}" class="hover:text-teal-300 transition">Beranda</a>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-teal-300 font-semibold">Daftar Informasi Publik (DIP)</span>
        </nav>
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl text-white">Daftar Informasi Publik (DIP)</h1>
        <p class="text-slate-200 text-xs sm:text-sm mt-2 max-w-2xl">
            Repositori resmi dokumen dan informasi publik PT Bhakti Husada Wonosobo. Cari, filter, dan unduh dokumen publik secara terbuka.
        </p>
    </div>
</section>

<!-- Filter & Table Section -->
<section class="py-12 bg-slate-50 min-h-[600px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Search & Filter Controls -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm mb-8 space-y-4">
            <form action="{{ route('dip.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <input type="hidden" name="kategori" value="{{ $category }}">
                
                <div class="md:col-span-8">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Cari Judul / Nomor Registrasi</label>
                    <div class="relative">
                        <input type="text" name="q" value="{{ $search }}" placeholder="Ketik kata kunci dokumen..." class="w-full bg-slate-50 border border-slate-300 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-teal-500">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>

                <div class="md:col-span-4 flex items-end gap-2">
                    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-2.5 rounded-xl text-sm transition shadow-sm">
                        Cari Dokumen
                    </button>
                    @if($search || $category !== 'semua' || $year)
                    <a href="{{ route('dip.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold px-4 py-2.5 rounded-xl text-sm transition">
                        Reset
                    </a>
                    @endif
                </div>
            </form>

            <!-- Category Tabs -->
            <div class="pt-4 border-t border-slate-100 flex flex-wrap gap-2 text-xs font-semibold">
                <a href="{{ route('dip.index', ['kategori' => 'semua', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'semua' ? 'bg-teal-600 text-white border-teal-600 shadow-sm' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                    Semua ({{ $categoryCounts['semua'] }})
                </a>
                <a href="{{ route('dip.index', ['kategori' => 'berkala', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'berkala' ? 'bg-teal-600 text-white border-teal-600 shadow-sm' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                    Berkala ({{ $categoryCounts['berkala'] }})
                </a>
                <a href="{{ route('dip.index', ['kategori' => 'serta-merta', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'serta-merta' ? 'bg-teal-600 text-white border-teal-600 shadow-sm' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                    Serta Merta ({{ $categoryCounts['serta-merta'] }})
                </a>
                <a href="{{ route('dip.index', ['kategori' => 'setiap-saat', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'setiap-saat' ? 'bg-teal-600 text-white border-teal-600 shadow-sm' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                    Setiap Saat ({{ $categoryCounts['setiap-saat'] }})
                </a>
                <a href="{{ route('dip.index', ['kategori' => 'dikecualikan', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'dikecualikan' ? 'bg-teal-600 text-white border-teal-600 shadow-sm' : 'bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                    Dikecualikan ({{ $categoryCounts['dikecualikan'] }})
                </a>
            </div>
        </div>

        <!-- Table View -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase text-[11px] font-semibold tracking-wider">
                        <tr>
                            <th class="px-6 py-4">No. Registrasi</th>
                            <th class="px-6 py-4">Judul Dokumen Informasi</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Tahun</th>
                            <th class="px-6 py-4 text-right">Aksi / Unduh</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($documents as $doc)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-4 font-mono text-xs font-semibold text-teal-700">
                                {{ $doc->registration_number }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-800 text-sm">{{ $doc->title }}</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Ukuran File: {{ $doc->file_size ?? 'PDF' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($doc->category === 'berkala')
                                    <span class="bg-teal-50 text-teal-700 border border-teal-200 text-xs px-2.5 py-0.5 rounded-full font-semibold">Berkala</span>
                                @elseif($doc->category === 'serta-merta')
                                    <span class="bg-sky-50 text-sky-700 border border-sky-200 text-xs px-2.5 py-0.5 rounded-full font-semibold">Serta Merta</span>
                                @elseif($doc->category === 'setiap-saat')
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs px-2.5 py-0.5 rounded-full font-semibold">Setiap Saat</span>
                                @else
                                    <span class="bg-rose-50 text-rose-700 border border-rose-200 text-xs px-2.5 py-0.5 rounded-full font-semibold">Dikecualikan</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-600">
                                {{ $doc->year }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if($doc->category === 'dikecualikan')
                                    <span class="inline-flex items-center gap-1 bg-slate-100 text-slate-500 text-[11px] font-semibold px-3 py-1.5 rounded-xl border border-slate-200 cursor-not-allowed select-none">
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                        Dikecualikan (Tidak Diunduh)
                                    </span>
                                @else
                                    <a href="{{ route('dip.download', $doc->id) }}" class="inline-flex items-center gap-1.5 bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        Unduh
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                Tidak ada dokumen informasi publik yang sesuai dengan kriteria pencarian Anda.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($documents->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                {{ $documents->links() }}
            </div>
            @endif
        </div>

    </div>
</section>
@endsection
