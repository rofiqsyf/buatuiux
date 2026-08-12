@extends('layouts.public')

@section('title', 'Regulasi & Payung Hukum KIP (Keterbukaan Informasi Publik) - PT Bhakti Husada Wonosobo')

@section('content')
<section class="hero-gradient text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl text-white">Regulasi & Payung Hukum KIP (Keterbukaan Informasi Publik)</h1>
        <p class="text-slate-200 text-xs sm:text-sm mt-2 max-w-2xl">
            Landasan hukum dan Standar Operasional Prosedur (SOP) pelaksanaan Keterbukaan Informasi Publik di lingkungan PT Bhakti Husada Wonosobo.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[600px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Filter Controls -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm mb-8 space-y-4">
            <form action="{{ route('regulations.public') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <input type="hidden" name="kategori" value="{{ $category }}">
                
                <div class="md:col-span-8">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Cari Regulasi</label>
                    <div class="relative">
                        <input type="text" name="q" value="{{ $search }}" placeholder="Ketik kata kunci regulasi atau perundangan..." class="w-full bg-slate-50 border border-slate-300 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-teal-500">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>

                <div class="md:col-span-4 flex items-end gap-2">
                    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-2.5 rounded-xl text-sm transition shadow-sm">
                        Cari Regulasi
                    </button>
                    @if($search || $category !== 'semua' || $year)
                    <a href="{{ route('regulations.public') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold px-4 py-2.5 rounded-xl text-sm transition">
                        Reset
                    </a>
                    @endif
                </div>
            </form>

            <div class="pt-4 border-t border-slate-100 flex flex-wrap gap-2 text-xs font-semibold">
                <a href="{{ route('regulations.public', ['kategori' => 'semua', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'semua' ? 'bg-teal-600 text-white border-teal-600' : 'bg-slate-50 text-slate-600 border-slate-200' }}">
                    Semua Regulasi ({{ $counts['semua'] }})
                </a>
                <a href="{{ route('regulations.public', ['kategori' => 'uu', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'uu' ? 'bg-teal-600 text-white border-teal-600' : 'bg-slate-50 text-slate-600 border-slate-200' }}">
                    Undang-Undang ({{ $counts['uu'] }})
                </a>
                <a href="{{ route('regulations.public', ['kategori' => 'pp', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'pp' ? 'bg-teal-600 text-white border-teal-600' : 'bg-slate-50 text-slate-600 border-slate-200' }}">
                    Peraturan Pemerintah ({{ $counts['pp'] }})
                </a>
                <a href="{{ route('regulations.public', ['kategori' => 'perki', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'perki' ? 'bg-teal-600 text-white border-teal-600' : 'bg-slate-50 text-slate-600 border-slate-200' }}">
                    PERKI ({{ $counts['perki'] }})
                </a>
                <a href="{{ route('regulations.public', ['kategori' => 'internal', 'q' => $search]) }}" class="px-4 py-2 rounded-xl border transition {{ $category === 'internal' ? 'bg-teal-600 text-white border-teal-600' : 'bg-slate-50 text-slate-600 border-slate-200' }}">
                    SOP Internal ({{ $counts['internal'] }})
                </a>
            </div>
        </div>

        <!-- Regulations List -->
        <div class="space-y-4">
            @forelse($regulations as $reg)
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-2 text-xs">
                        <span class="bg-teal-50 text-teal-700 font-bold px-2.5 py-0.5 rounded-full uppercase border border-teal-100">{{ strtoupper($reg->category) }}</span>
                        <span class="text-slate-400 font-semibold">Tahun {{ $reg->year }}</span>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base sm:text-lg">{{ $reg->title }}</h3>
                    <p class="text-xs text-slate-500">{{ $reg->sub_title ?? 'Peraturan Pelaksanaan Keterbukaan Informasi' }}</p>
                </div>
                
                @if($reg->file_path)
                <a href="{{ asset('storage/' . $reg->file_path) }}" target="_blank" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition flex items-center gap-1.5 shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Unduh File PDF
                </a>
                @else
                <span class="text-xs text-slate-400 italic">Dokumen Teks Resmi</span>
                @endif
            </div>
            @empty
            <div class="bg-white p-12 rounded-3xl border border-slate-200 text-center text-slate-500">
                Belum ada regulasi yang sesuai dengan pencarian Anda.
            </div>
            @endforelse
        </div>

        @if($regulations->hasPages())
        <div class="mt-8">
            {{ $regulations->links() }}
        </div>
        @endif

    </div>
</section>
@endsection
