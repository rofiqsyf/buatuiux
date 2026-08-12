@extends('layouts.public')

@section('title', 'Struktur Perusahaan - PT Bhakti Husada Wonosobo')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs font-bold text-teal-300 uppercase tracking-widest mb-2">
            <a href="{{ route('profil') }}" class="hover:underline">Profil</a>
            <span>&rsaquo;</span>
            <span>Struktur Perusahaan</span>
        </div>
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl text-white">Struktur Perusahaan & Pelayanan</h1>
        <p class="text-slate-200 text-sm sm:text-base mt-3 max-w-3xl leading-relaxed">
            Susunan kepengurusan, pejabat pengarah, serta tim pelaksana operasional pengelola informasi publik PT Bhakti Husada Wonosobo (Perseroda).
        </p>
    </div>
</section>

<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Bagan Struktur Utama -->
        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-8">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Hirarki & Tanggung Jawab</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">Bagan Pejabat Pengelola Informasi & Dokumentasi</h2>
                <p class="text-xs text-slate-500 mt-1">Struktur resmi berdasarkan Penetapan Manajemen Perusahaan</p>
            </div>

            <!-- Card Pimpinan Utama -->
            <div class="max-w-md mx-auto bg-gradient-to-br from-teal-900 to-slate-900 text-white p-6 rounded-2xl text-center space-y-2 shadow-lg border border-teal-500/30">
                <div class="w-16 h-16 rounded-full bg-teal-500 text-slate-900 font-extrabold flex items-center justify-center mx-auto text-xl shadow-inner">
                    S
                </div>
                <h3 class="font-heading font-bold text-lg text-white pt-1">Sumali Ibnu Chamid, S.Sos.I</h3>
                <span class="inline-block bg-teal-400/20 text-teal-300 font-semibold px-3 py-1 rounded-full text-xs border border-teal-400/30 uppercase tracking-wider">Direktur Perusahaan / Pengarah Utama</span>
                <p class="text-[11px] text-slate-300 pt-1">Penanggung Jawab Tertinggi Tata Kelola & Kebijakan Keterbukaan Informasi BUMD</p>
            </div>

            <!-- Line Divider Connector -->
            <div class="flex justify-center">
                <div class="w-0.5 h-8 bg-teal-500"></div>
            </div>

            <!-- Level 2: Tim Admin & Operator -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-teal-50/60 p-6 rounded-2xl border border-teal-200 text-center space-y-2">
                    <div class="w-12 h-12 rounded-full bg-teal-600 text-white font-bold flex items-center justify-center mx-auto text-base">
                        A
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Ketua Tim Informasi (Admin Utama)</h3>
                    <p class="text-xs font-semibold text-teal-700">Tim Admin Pengolah Dokumen</p>
                    <p class="text-xs text-slate-600 leading-relaxed pt-1">Bertanggung jawab atas pengumpulan, pengategorian katalog DIP, dan koordinasi respon permohonan publik.</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center space-y-2">
                    <div class="w-12 h-12 rounded-full bg-slate-800 text-white font-bold flex items-center justify-center mx-auto text-base">
                        P
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Petugas Meja Pelayanan (Operator)</h3>
                    <p class="text-xs font-semibold text-teal-600">Tim Pelaksana Meja Layanan</p>
                    <p class="text-xs text-slate-600 leading-relaxed pt-1">Melayani permohonan fisik/online, verifikasi kelengkapan Lampiran Surat / Dokumen Pendukung, dan pengiriman berkas.</p>
                </div>

            </div>

            <!-- Level 3: Unit Kerja Pendukung -->
            <div class="pt-6 border-t border-slate-100 grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                    <h4 class="font-bold text-xs text-slate-800">Divisi Distribusi Farmasi</h4>
                    <p class="text-[11px] text-slate-500 mt-1">Penyedia Data Stok & Katalog Alkes</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                    <h4 class="font-bold text-xs text-slate-800">Divisi Keuangan & Akuntansi</h4>
                    <p class="text-[11px] text-slate-500 mt-1">Penyedia Laporan Keuangan & Audited DIP</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                    <h4 class="font-bold text-xs text-slate-800">Divisi Hukum & Sekretariat</h4>
                    <p class="text-[11px] text-slate-500 mt-1">Penguji Konsekuensi Informasi Dikecualikan</p>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
