@extends('layouts.public')

@section('title', 'Berita & Publikasi Kegiatan - PT Bhakti Husada')

@section('content')
<section class="hero-gradient text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl text-white">Berita & Publikasi Kegiatan</h1>
        <p class="text-slate-200 text-xs sm:text-sm mt-2 max-w-2xl">
            Publikasi kegiatan, pengumuman transparansi, dan siaran pers Pejabat Pengelola Informasi dan Dokumentasi PT Bhakti Husada Wonosobo.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[600px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Main News Grid -->
            <div class="md:col-span-2 space-y-6">
                @forelse($newsList as $news)
                <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition flex flex-col sm:flex-row">
                    @if($news->image_url)
                    <div class="sm:w-48 h-48 sm:h-auto shrink-0 bg-slate-100 relative">
                        <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                    </div>
                    @endif
                    <div class="p-6 space-y-3 flex-1">
                        <div class="flex items-center gap-3 text-xs text-slate-400">
                            <span class="bg-teal-50 text-teal-700 font-semibold px-2.5 py-0.5 rounded-full border border-teal-100">{{ $news->category }}</span>
                            <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}</span>
                        </div>
                        <h2 class="font-heading font-bold text-slate-800 text-lg leading-snug hover:text-teal-600 transition">
                            <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                        </h2>
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">
                            {{ $news->summary }}
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('news.show', $news->slug) }}" class="inline-flex items-center text-xs font-bold text-teal-600 hover:text-teal-700 gap-1.5 group">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-4 h-4 text-teal-600 transition transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="bg-white p-12 rounded-3xl border border-slate-200 text-center text-slate-500">
                    Belum ada berita atau publikasi transparansi yang tersedia.
                </div>
                @endforelse

                @if($newsList->hasPages())
                <div class="pt-4">
                    {{ $newsList->links() }}
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm space-y-4">
                    <h3 class="font-heading font-bold text-slate-800 text-base border-b border-slate-100 pb-2">Dokumen DIP Terbaru</h3>
                    <ul class="space-y-3 text-xs">
                        @foreach($dipDocs as $doc)
                        <li class="border-b border-slate-50 pb-2">
                            <a href="{{ route('dip.download', $doc->id) }}" class="font-semibold text-slate-700 hover:text-teal-600 transition line-clamp-2">{{ $doc->title }}</a>
                            <span class="text-[10px] text-slate-400 block mt-0.5">{{ $doc->registration_number }} | Tahun {{ $doc->year }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
