@extends('layouts.public')

@section('title', 'Visi & Misi Pelayanan - PT Bhakti Husada Wonosobo')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-slate-300 mb-3">
            <a href="{{ route('home') }}" class="hover:text-teal-300 transition">Beranda</a>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('profil') }}" class="hover:text-teal-300 transition">Profil</a>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-teal-300 font-semibold">Visi & Misi</span>
        </nav>
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl text-white">Visi & Misi Pelayanan</h1>
        <p class="text-slate-200 text-sm sm:text-base mt-3 max-w-3xl leading-relaxed">
            Arah kebijakan strategis dan komitmen utama PT Bhakti Husada Wonosobo dalam mewujudkan pelayanan keterbukaan informasi publik yang berkualitas dan berintegritas.
        </p>
    </div>
</section>

<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Visi & Misi Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Visi -->
            <div class="lg:col-span-5 bg-gradient-to-br from-teal-800 to-brand-dark text-white p-8 sm:p-10 rounded-3xl shadow-lg space-y-4 relative overflow-hidden">
                <div class="w-12 h-12 rounded-2xl bg-white/10 text-teal-300 flex items-center justify-center font-bold mb-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span class="text-xs font-bold text-teal-300 uppercase tracking-widest">Visi Perusahaan & Layanan</span>
                <h2 class="font-heading font-extrabold text-2xl sm:text-3xl leading-snug">Visi Utama</h2>
                <p class="text-sm text-slate-100 leading-relaxed pt-2">
                    "Terwujudnya tata kelola BUMD yang profesional, akuntabel, dan terpercaya melalui pelayanan perbekalan kesehatan terstandar serta keterbukaan informasi publik yang transparan dan mudah diakses oleh seluruh masyarakat Kabupaten Wonosobo."
                </p>
            </div>

            <!-- Misi -->
            <div class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div>
                    <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Langkah Strategis</span>
                    <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">Misi Pelayanan Operasional</h2>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="w-8 h-8 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">1</div>
                        <div>
                            <h3 class="font-heading font-bold text-slate-800 text-sm">Penyediaan Informasi Publik yang Sah & Terpercaya</h3>
                            <p class="text-xs text-slate-600 mt-1 leading-relaxed">Mengumpulkan, mengolah, dan menyajikan dokumen serta laporan kinerja publik BUMD secara berkala, akurat, dan dapat dipertanggungjawabkan.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="w-8 h-8 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">2</div>
                        <div>
                            <h3 class="font-heading font-bold text-slate-800 text-sm">Kemudahan Akses Digital Tanpa Biaya Berlebihan</h3>
                            <p class="text-xs text-slate-600 mt-1 leading-relaxed">Memfasilitasi permohonan informasi publik secara online melalui portal digital terpadu demi kenyamanan warga masyarakat.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <div class="w-8 h-8 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">3</div>
                        <div>
                            <h3 class="font-heading font-bold text-slate-800 text-sm">Sinergi & Kepatuhan Regulasi Pemerintah Daerah</h3>
                            <p class="text-xs text-slate-600 mt-1 leading-relaxed">Membangun tata kelola keterbukaan informasi yang selaras dengan arahan Pemkab Wonosobo dan Dinas Komunikasi dan Informatika.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Nilai-Nilai Utama (Core Values) -->
        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Budaya Kerja</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">Nilai-Nilai Utama Pelayanan (Core Values)</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-teal-100/80 text-teal-700 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Integritas</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Jujur, sah, dan memegang teguh standar etika pelayanan publik.</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Akuntabilitas</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Dapat dipertanggungjawabkan sesuai hukum dan aturan perundangan.</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-cyan-100/80 text-cyan-700 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Transparansi</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Terbuka, mudah diakses, tanpa diskriminasi kepada publik.</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-blue-100/80 text-blue-700 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Responsif</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Cepat, ramah, dan solutif dalam menangani setiap permohonan.</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
