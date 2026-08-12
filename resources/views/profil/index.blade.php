@extends('layouts.public')

@section('title', 'Profil Perusahaan - PT Bhakti Husada Wonosobo')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold text-teal-300 uppercase tracking-widest bg-white/10 px-3 py-1 rounded-full border border-white/20">Tentang BUMD</span>
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl text-white mt-3">Profil PT Bhakti Husada Wonosobo</h1>
        <p class="text-slate-200 text-sm sm:text-base mt-3 max-w-3xl leading-relaxed">
            Badan Usaha Milik Daerah (BUMD) Perseroda yang bergerak di bidang kefarmasian, perbekalan kesehatan, serta penyediaan layanan informasi publik yang transparan dan akuntabel di Kabupaten Wonosobo.
        </p>
    </div>
</section>

<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Sekilas Perusahaan -->
        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-6 space-y-4">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Latar Belakang & Peran Strategis</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800">Komitmen Layanan Publik & Tata Kelola BUMD</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    PT Bhakti Husada Wonosobo (Perseroda) didirikan untuk mendukung ketahanan kesehatan daerah melalui jaminan ketersediaan obat, perbekalan kesehatan terstandar, serta jaringan pelayanan kefarmasian yang terjangkau bagi masyarakat Kabupaten Wonosobo.
                </p>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Sebagai entitas BUMD, kami berkomitmen penuh menjalankan prinsip <em>Good Corporate Governance</em> (GCG) dan asas keterbukaan informasi publik sesuai amanat UU No. 14 Tahun 2008.
                </p>
            </div>
            <div class="lg:col-span-6 space-y-4">
                <div class="rounded-2xl overflow-hidden shadow-lg border border-slate-200 group">
                    <img src="{{ asset('assets/Gambar PT Bhakti Husada.jpg') }}" alt="Gedung PT Bhakti Husada Wonosobo (Perseroda)" class="w-full h-64 sm:h-72 object-cover group-hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>

        <!-- Pilar Utama Pelayanan -->
        <div class="space-y-6">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="font-heading font-extrabold text-2xl text-slate-800">4 Pilar Layanan PT Bhakti Husada</h2>
                <p class="text-xs text-slate-500 mt-1">Sinergi antara pelayanan kefarmasian dan transparansi publik</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.6 15.12a2 2 0 00-1.023.547l-1.023 1.023A2 2 0 003 18.107V20a1 1 0 001 1h16a1 1 0 001-1v-1.893a2 2 0 00-.554-1.414l-1.018-1.265z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Distribusi Obat</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Penyediaan perbekalan farmasi resmi terstandar bagi fasilitas kesehatan daerah.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Apotek Resmi</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Jaringan apotek terjangkau dan akuntabel untuk kebutuhan publik.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Informasi Publik</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Katalog dokumen publik yang diperbarui secara transparan dan berkala.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Layanan Permohonan</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Fasilitas pengajuan permohonan informasi publik online bebas pungli.</p>
                </div>
            </div>
        </div>

        <!-- Quick Navigation Subpages -->
        <div class="bg-teal-900 text-white p-8 sm:p-10 rounded-3xl grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left items-center">
            <div class="md:col-span-2 space-y-2">
                <h3 class="font-heading font-extrabold text-xl">Ingin Mengenal Lebih Dekat Layanan Kami?</h3>
                <p class="text-xs text-teal-200">Jelaskan Visi Misi, Tugas Operasional, Bagan Organisasi, dan Maklumat Pelayanan resmi kami.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 justify-end">
                <a href="{{ route('profil.visi-misi') }}" class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2 rounded-xl transition shadow-sm">
                    <span>Lihat Visi & Misi</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
