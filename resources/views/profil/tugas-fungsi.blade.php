@extends('layouts.public')

@section('title', 'Tugas & Fungsi Operasional - PT Bhakti Husada Wonosobo')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs font-bold text-teal-300 uppercase tracking-widest mb-2">
            <a href="{{ route('profil') }}" class="hover:underline">Profil</a>
            <span>&rsaquo;</span>
            <span>Tugas & Fungsi</span>
        </div>
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl text-white">Tugas & Fungsi Operasional</h1>
        <p class="text-slate-200 text-sm sm:text-base mt-3 max-w-3xl leading-relaxed">
            Rincian wewenang operasional, tugas pokok pengelola informasi, dan standar penanganan dokumen publik PT Bhakti Husada Wonosobo.
        </p>
    </div>
</section>

<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Grid Tugas Pokok -->
        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-8">
            <div>
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Ruang Lingkup Tanggung Jawab</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">Tugas Utama Pengelola Informasi BUMD</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-sm">1</div>
                        <h3 class="font-heading font-bold text-slate-800 text-base">Pengumpulan & Pendataan Dokumen</h3>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Mengoordinasikan pengumpulan seluruh arsip, laporan keuangan, dokumen kebijakan, serta katalog perbekalan farmasi dari seluruh unit kerja PT Bhakti Husada Wonosobo.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-sm">2</div>
                        <h3 class="font-heading font-bold text-slate-800 text-base">Klasifikasi & Penetapan DIP</h3>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Pengelompokan dokumen publik ke dalam kategori Informasi Berkala, Informasi Serta Merta, dan Informasi Setiap Saat sesuai regulasi yang berlaku.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-sm">3</div>
                        <h3 class="font-heading font-bold text-slate-800 text-base">Pelayanan & Verifikasi Permohonan</h3>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Menerima, memverifikasi identitas pemohon, dan memproses setiap permohonan informasi yang masuk melalui formulir online maupun meja pelayanan fisik.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold text-sm">4</div>
                        <h3 class="font-heading font-bold text-slate-800 text-base">Pengujian Konsekuensi Informasi</h3>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Melakukan pengujian ketat atas informasi yang dikecualikan (seperti rahasia dagang/proses bisnis internal) dengan mempertimbangkan prinsip perlindungan data publik.
                    </p>
                </div>

            </div>
        </div>

        <!-- Link Banner to Dedicated Prosedur Page -->
        <div class="bg-teal-900 text-white p-8 sm:p-10 rounded-3xl grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left items-center">
            <div class="md:col-span-2 space-y-2">
                <h3 class="font-heading font-extrabold text-xl">Ingin Melihat Alur & Prosedur Pelayanan Lengkap?</h3>
                <p class="text-xs text-teal-200">Pelajari SOP Permohonan Informasi, Pengajuan Keberatan, dan Mekanisme Sengketa Informasi Publik pada halaman khusus.</p>
            </div>
            <div class="flex justify-center md:justify-end">
                <a href="{{ route('prosedur.public') }}" class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-5 py-3 rounded-xl transition shadow-sm">
                    <span>Buka Alur & Prosedur</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
