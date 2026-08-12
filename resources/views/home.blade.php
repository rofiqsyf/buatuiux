@extends('layouts.public')

@section('title', 'Beranda - Layanan Informasi Publik PT Bhakti Husada Wonosobo')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white relative overflow-hidden py-20 lg:py-28">
    <!-- Background Hero Image Overlay (Clear & Visible Building Photo) -->
    <div class="absolute inset-0 bg-cover bg-center opacity-60 mix-blend-overlay" style="background-image: url('{{ asset('assets/Gambar PT Bhakti Husada.jpg') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-brand-dark/80 via-brand-dark/40 to-transparent"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <h1 class="font-heading font-extrabold text-3xl sm:text-5xl leading-tight tracking-tight text-white">
                    Layanan Informasi Publik <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-emerald-400">PT Bhakti Husada Wonosobo</span>
                </h1>

                <p class="text-slate-200 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Akses transparan, mudah, dan akuntabel untuk memperoleh informasi publik, dokumen resmi, dan pengajuan permohonan informasi secara daring.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('request.create') }}" class="w-full sm:w-auto bg-teal-500 hover:bg-teal-400 text-slate-950 font-extrabold px-6 py-3.5 rounded-xl text-sm transition shadow-lg hover:shadow-teal-500/25 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Ajukan Permohonan Informasi
                    </a>
                    <a href="{{ route('dip.index') }}" class="w-full sm:w-auto bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3.5 rounded-xl text-sm transition border border-white/20 flex items-center justify-center gap-2 backdrop-blur-sm">
                        <svg class="w-4 h-4 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Jelajahi Informasi DIP</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5 hidden lg:block">
                <div class="bg-white/10 backdrop-blur-xl p-6 rounded-3xl border border-white/20 shadow-2xl relative">
                    <div class="bg-brand-dark p-6 rounded-2xl border border-slate-700/50 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-700 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-teal-400 animate-pulse"></span>
                                <span class="text-xs font-bold text-teal-300 uppercase tracking-wider">Akses Cepat Layanan Informasi</span>
                            </div>
                            <span class="text-[10px] bg-teal-900/60 text-teal-300 px-2 py-0.5 rounded font-mono border border-teal-500/30">ALUR PERMOHONAN</span>
                        </div>

                        <div class="space-y-3 pt-1">
                            <!-- 01: DIP -->
                            <a href="{{ route('dip.index') }}" class="flex items-start gap-3 bg-slate-800/60 hover:bg-slate-800/90 p-3.5 rounded-xl border border-slate-700/40 hover:border-teal-500/50 transition cursor-pointer group block">
                                <div class="w-8 h-8 rounded-lg bg-teal-500/20 text-teal-300 group-hover:bg-teal-500 group-hover:text-slate-950 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs font-mono border border-teal-500/30 transition">
                                    01
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-xs font-bold text-white group-hover:text-teal-300 transition">Cari Dokumen Publik (DIP)</h4>
                                        <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-teal-400 group-hover:translate-x-1 transition transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </div>
                                    <p class="text-[11px] text-slate-300 leading-tight mt-0.5">Telusuri informasi berkala, serta-merta, dan setiap saat yang dipublikasikan secara terbuka.</p>
                                </div>
                            </a>

                            <!-- 02: Permohonan -->
                            <a href="{{ route('request.create') }}" class="flex items-start gap-3 bg-slate-800/60 hover:bg-slate-800/90 p-3.5 rounded-xl border border-slate-700/40 hover:border-teal-500/50 transition cursor-pointer group block">
                                <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-300 group-hover:bg-emerald-500 group-hover:text-slate-950 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs font-mono border border-emerald-500/30 transition">
                                    02
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-xs font-bold text-white group-hover:text-emerald-300 transition">Isi Formulir Permohonan</h4>
                                        <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-emerald-400 group-hover:translate-x-1 transition transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </div>
                                    <p class="text-[11px] text-slate-300 leading-tight mt-0.5">Lengkapi data diri pemohon dan rincian dokumen informasi publik yang Anda butuhkan.</p>
                                </div>
                            </a>

                            <!-- 03: Tracking -->
                            <button onclick="openTrackingModal()" class="w-full text-left flex items-start gap-3 bg-slate-800/60 hover:bg-slate-800/90 p-3.5 rounded-xl border border-slate-700/40 hover:border-teal-500/50 transition cursor-pointer group">
                                <div class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-300 group-hover:bg-cyan-500 group-hover:text-slate-950 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs font-mono border border-cyan-500/30 transition">
                                    03
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-xs font-bold text-white group-hover:text-cyan-300 transition">Pantau Status Permohonan</h4>
                                        <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-cyan-400 group-hover:translate-x-1 transition transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </div>
                                    <p class="text-[11px] text-slate-300 leading-tight mt-0.5">Lacak proses verifikasi dan penerbitan dokumen informasi menggunakan nomor tiket Anda.</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Statistik Layanan Counter -->
<section class="bg-white border-b border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="text-3xl font-heading font-extrabold text-brand-900">{{ $stats['total_docs'] }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wider">Total Dokumen Publik</div>
            </div>
            <div class="p-4 rounded-2xl bg-teal-50/60 border border-teal-100">
                <div class="text-3xl font-heading font-extrabold text-teal-600">{{ $stats['berkala'] }}</div>
                <div class="text-xs font-semibold text-teal-700 mt-1 uppercase tracking-wider">Informasi Berkala</div>
            </div>
            <div class="p-4 rounded-2xl bg-sky-50/60 border border-sky-100">
                <div class="text-3xl font-heading font-extrabold text-sky-600">{{ $stats['serta_merta'] }}</div>
                <div class="text-xs font-semibold text-sky-700 mt-1 uppercase tracking-wider">Informasi Serta Merta</div>
            </div>
            <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-100">
                <div class="text-3xl font-heading font-extrabold text-emerald-600">{{ $stats['setiap_saat'] }}</div>
                <div class="text-xs font-semibold text-emerald-700 mt-1 uppercase tracking-wider">Informasi Setiap Saat</div>
            </div>
        </div>
    </div>
</section>

<!-- Bento Grid Kategori DIP -->
<section id="kategori" class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-brand-900">Kategori Daftar Informasi Publik (DIP)</h2>
            <p class="text-slate-600 text-sm mt-2">Dokumen resmi disajikan secara terbuka, transparan, dan akuntabel.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Berkala -->
            <a href="{{ route('dip.index', ['kategori' => 'berkala']) }}" class="bg-white p-7 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center font-bold mb-5 group-hover:bg-teal-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-lg group-hover:text-teal-600 transition">Informasi Berkala</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">Dokumen yang diperbarui dan diumumkan secara rutin seperti laporan keuangan, laporan kinerja, dan program kerja.</p>
                </div>
                <div class="mt-6 flex items-center text-xs font-bold text-teal-600 gap-1.5 group-hover:translate-x-1 transition transform">
                    <span>Lihat {{ $stats['berkala'] }} Dokumen</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            <!-- Card 2: Serta Merta -->
            <a href="{{ route('dip.index', ['kategori' => 'serta-merta']) }}" class="bg-white p-7 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center font-bold mb-5 group-hover:bg-sky-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-lg group-hover:text-sky-600 transition">Informasi Serta Merta</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">Informasi yang dapat mengancam hajat hidup orang banyak dan ketertiban umum yang diumumkan serta-merta.</p>
                </div>
                <div class="mt-6 flex items-center text-xs font-bold text-sky-600 gap-1.5 group-hover:translate-x-1 transition transform">
                    <span>Lihat {{ $stats['serta_merta'] }} Dokumen</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            <!-- Card 3: Setiap Saat -->
            <a href="{{ route('dip.index', ['kategori' => 'setiap-saat']) }}" class="bg-white p-7 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 group flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold mb-5 group-hover:bg-emerald-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 01-2-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-lg group-hover:text-emerald-600 transition">Informasi Setiap Saat</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">Informasi yang wajib disediakan dan dapat diakses oleh pemohon publik setiap saat setelah melalui prosedur permintaan.</p>
                </div>
                <div class="mt-6 flex items-center text-xs font-bold text-emerald-600 gap-1.5 group-hover:translate-x-1 transition transform">
                    <span>Lihat {{ $stats['setiap_saat'] }} Dokumen</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Layanan E-PPID Interaktif -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-brand-900 to-slate-900 rounded-3xl p-8 sm:p-12 text-white relative overflow-hidden shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-4">
                    <span class="text-xs font-bold text-teal-400 uppercase tracking-widest bg-teal-950/80 border border-teal-800 px-3 py-1 rounded-full">Layanan Informasi Online</span>
                    <h2 class="font-heading font-extrabold text-2xl sm:text-4xl text-white">Butuh Informasi Publik Spesifik?</h2>
                    <p class="text-slate-300 text-xs sm:text-sm leading-relaxed max-w-xl">
                        Masyarakat dapat mengajukan permohonan informasi resmi secara mudah tanpa harus datang langsung ke kantor. Lengkapi formulir dan sertakan Lampiran Surat / Dokumen Pendukung.
                    </p>
                </div>
                <div class="lg:col-span-4 flex flex-col gap-3">
                    <a href="{{ route('request.create') }}" class="bg-teal-500 hover:bg-teal-400 text-slate-950 font-extrabold px-6 py-3.5 rounded-xl text-xs sm:text-sm text-center transition shadow-lg flex items-center justify-center gap-2">
                        <span>Isi Formulir Permohonan</span>
                        <svg class="w-4 h-4 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <button onclick="openTrackingModal()" class="bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3.5 rounded-xl text-xs sm:text-sm text-center transition border border-white/20">
                        Lacak Tiket Permohonan
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Terbaru -->
@if(count($latestNews) > 0)
<section class="py-16 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-brand-900">Berita & Publikasi Kegiatan</h2>
                <p class="text-slate-600 text-xs sm:text-sm mt-1">Kabar terbaru mengenai keterbukaan informasi dan kegiatan PT Bhakti Husada.</p>
            </div>
            <a href="{{ route('news.public') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-teal-600 hover:text-teal-700 transition shrink-0 group">
                <span>Lihat Semua Berita</span>
                <svg class="w-4 h-4 text-teal-600 transition transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($latestNews as $news)
            <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition flex flex-col group">
                @if($news->image_url)
                <div class="w-full h-48 sm:h-52 bg-slate-100 relative overflow-hidden">
                    <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                @else
                <div class="w-full h-48 sm:h-52 bg-gradient-to-br from-teal-900 via-teal-800 to-slate-900 relative overflow-hidden flex items-center justify-center text-teal-200 p-6">
                    <div class="text-center space-y-2">
                        <svg class="w-10 h-10 mx-auto text-teal-400 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <span class="text-xs font-bold uppercase tracking-widest block text-teal-300">PT Bhakti Husada Wonosobo</span>
                        <span class="text-[11px] text-teal-100/70 font-medium block">Publikasi & Kegiatan BUMD</span>
                    </div>
                </div>
                @endif
                <div class="p-6 flex-grow space-y-3">
                    <div class="flex items-center gap-3 text-xs text-slate-400">
                        <span class="bg-teal-50 text-teal-700 border border-teal-100 font-semibold px-2.5 py-0.5 rounded-full">{{ $news->category }}</span>
                        <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}</span>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-lg leading-snug hover:text-teal-600 transition">
                        <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                        {{ $news->summary }}
                    </p>
                </div>
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex justify-between items-center text-xs">
                    <a href="{{ route('news.show', $news->slug) }}" class="font-bold text-teal-600 hover:text-teal-700 flex items-center gap-1.5 group">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4 text-teal-600 transition transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Mobile Full-Width Button -->
        <div class="mt-8 text-center sm:hidden">
            <a href="{{ route('news.public') }}" class="inline-flex items-center justify-center w-full bg-white border border-slate-300 hover:bg-teal-50 hover:border-teal-300 text-slate-800 hover:text-teal-700 font-bold py-3.5 px-5 rounded-2xl text-xs shadow-sm transition gap-2">
                <span>Lihat Semua Berita & Publikasi</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif
@endsection
