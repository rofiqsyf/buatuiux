@extends('layouts.public')

@section('title', $news->title . ' - PPID PT Bhakti Husada Wonosobo')
@section('meta_description', $news->summary)

@section('seo_meta')
<!-- OpenGraph SEO Tags for Social Share & Google Indexing -->
<meta property="og:title" content="{{ $news->title }}">
<meta property="og:description" content="{{ $news->summary }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url()->current() }}">
@if($news->image_url)
<meta property="og:image" content="{{ asset('storage/' . $news->image_url) }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="{{ asset('storage/' . $news->image_url) }}">
@endif
<meta name="twitter:title" content="{{ $news->title }}">
<meta name="twitter:description" content="{{ $news->summary }}">
@endsection

@section('content')
<section class="hero-gradient text-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center sm:text-left space-y-3">
        <div class="inline-flex items-center gap-2 bg-white/10 px-3.5 py-1 rounded-full text-xs font-medium text-teal-200">
            <span>{{ $news->category }}</span>
            <span>•</span>
            <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}</span>
        </div>
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl text-white leading-snug">{{ $news->title }}</h1>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[500px]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <article class="bg-white p-6 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            @if($news->image_url)
                <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" class="w-full h-64 sm:h-96 object-cover rounded-2xl shadow-sm border border-slate-200">
            @endif

            <div class="text-sm font-semibold text-slate-700 bg-teal-50/60 border border-teal-100 p-4.5 rounded-2xl leading-relaxed">
                {{ $news->summary }}
            </div>

            <!-- WYSIWYG Rich HTML Content (SEO Semantic Tags) -->
            <div class="prose prose-slate max-w-none text-sm sm:text-base text-slate-800 leading-relaxed space-y-4 pt-2">
                @if($news->content)
                    {!! $news->content !!}
                @else
                    <p>
                        <strong>Wonosobo</strong> — {{ $news->summary }} Pelaksanaan transparansi publik ini selaras dengan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. Setiap warga negara berhak memperoleh informasi publik sesuai prosedur yang berlaku pada PPID PT Bhakti Husada Wonosobo.
                    </p>
                @endif
            </div>

            <div class="pt-6 border-t border-slate-100 flex justify-between items-center text-xs font-semibold">
                <a href="{{ route('news.public') }}" class="inline-flex items-center gap-1.5 text-slate-500 hover:text-brand transition group">
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-brand transition transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>Kembali ke Berita</span>
                </a>
                <a href="{{ route('dip.index') }}" class="inline-flex items-center gap-1.5 text-teal-600 hover:text-teal-700 transition group font-bold">
                    <span>Lihat Dokumen DIP</span>
                    <svg class="w-4 h-4 text-teal-600 transition transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </article>
    </div>
</section>
@endsection
