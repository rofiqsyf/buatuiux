@extends('layouts.public')

@section('title', 'Alur & Prosedur Layanan Informasi Publik (SOP) - PT Bhakti Husada Wonosobo')
@section('meta_description', 'Dokumentasi SOP Alur & Prosedur Layanan Informasi Publik, Pengajuan Keberatan, dan Sengketa Informasi sesuai PERKI No. 1/2021 di PT Bhakti Husada Wonosobo.')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-14 lg:py-18 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-300 mb-3">
            <a href="{{ route('home') }}" class="hover:text-teal-300 transition">Beranda</a>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('dip.index') }}" class="hover:text-teal-300 transition">Informasi Publik</a>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-teal-300 font-semibold">Alur & SOP Layanan</span>
        </nav>
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl text-white">Alur & Prosedur Layanan (SOP)</h1>
        <p class="text-slate-200 text-sm sm:text-base mt-2 max-w-3xl leading-relaxed">
            Dokumentasi Standar Operasional Prosedur (SOP) resmi tata cara permohonan informasi publik, mekanisme pengajuan keberatan, dan sengketa informasi publik sesuai PERKI No. 1 Tahun 2021.
        </p>
    </div>
</section>

<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- 1. SOP Permohonan Informasi Publik -->
        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-8">
            <div class="border-b border-slate-100 pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">SOP No. 01/PPID/2024</span>
                    <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">1. Prosedur Permohonan Informasi Publik</h2>
                </div>
                <a href="{{ route('request.create') }}" class="inline-flex items-center justify-center bg-teal-600 hover:bg-teal-700 text-white font-bold px-5 py-2.5 rounded-xl text-xs transition shadow-sm gap-2 shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 01-2 2v11a2 2 0 012-2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Formulir Permohonan Online</span>
                </a>
            </div>

            <!-- Workflow Diagram (4 Steps Detailed) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="w-10 h-10 rounded-xl bg-teal-600 text-white font-mono font-bold text-sm flex items-center justify-center shadow-md">01</span>
                        <span class="text-[10px] font-bold text-teal-700 bg-teal-100 px-2 py-0.5 rounded uppercase">Pengajuan</span>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Pengajuan Berkas</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Pemohon mengisi formulir permohonan dan mengunggah Lampiran Surat / Dokumen Pendukung secara online atau di meja sekretariat PPID.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="w-10 h-10 rounded-xl bg-teal-600 text-white font-mono font-bold text-sm flex items-center justify-center shadow-md">02</span>
                        <span class="text-[10px] font-bold text-teal-700 bg-teal-100 px-2 py-0.5 rounded uppercase">Verifikasi</span>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Pemeriksaan Kelengkapan</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Petugas PPID meregistrasi berkas dalam waktu maksimal 1 hari kerja dan menerbitkan nomor tiket bukti penerimaan permohonan.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="w-10 h-10 rounded-xl bg-teal-600 text-white font-mono font-bold text-sm flex items-center justify-center shadow-md">03</span>
                        <span class="text-[10px] font-bold text-teal-700 bg-teal-100 px-2 py-0.5 rounded uppercase">Uji Akses</span>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Pengolahan & Uji Konsekuensi</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Tim PPID menelusuri fisik dokumen dan melakukan pengujian konsekuensi jika dokumen tersebut berpotensi tergolong informasi yang dikecualikan.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="w-10 h-10 rounded-xl bg-emerald-600 text-white font-mono font-bold text-sm flex items-center justify-center shadow-md">04</span>
                        <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded uppercase">Penyerahan</span>
                    </div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Pemberitahuan & Penyerahan</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        PPID menyampaikan Surat Pemberitahuan Tertulis beserta salinan informasi yang dimohonkan dalam jangka waktu maksimal 10 hari kerja.
                    </p>
                </div>
            </div>

            <!-- Matriks Biaya Penggandaan Fisik (SOP Spesifik) -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                <h4 class="font-heading font-bold text-slate-800 text-sm">Matriks Ketentuan Biaya Penggandaan Dokumen (SOP Resmi):</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-slate-600">
                    <div class="p-3.5 bg-white rounded-xl border border-slate-200 flex justify-between items-center">
                        <span>Format File Digital / Softcopy (Email / Download):</span>
                        <span class="font-bold text-emerald-600 font-mono">GRATIS / 0 RUPIAH</span>
                    </div>
                    <div class="p-3.5 bg-white rounded-xl border border-slate-200 flex justify-between items-center">
                        <span>Fotokopi Cetak Fisik (Diambil di Sekretariat):</span>
                        <span class="font-bold text-slate-800 font-mono">Sesuai Biaya Riil Fotokopi</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. SOP Pengajuan Keberatan Informasi -->
        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-8">
            <div class="border-b border-slate-100 pb-4">
                <span class="text-xs font-bold text-rose-600 uppercase tracking-wider">SOP No. 02/PPID/2024</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">2. Prosedur Pengajuan Keberatan Informasi</h2>
                <p class="text-xs text-slate-500 mt-1">Hak sanggah pemohon informasi apabila tanggapan permohonan dianggap tidak sesuai undang-undang</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 rounded-2xl bg-rose-50/40 border border-rose-100 space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-rose-600 text-white font-mono font-bold text-xs flex items-center justify-center">1</div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Alasan Keberatan Yang Sah</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Pemohon dapat mengajukan keberatan dengan alasan: penolakan tanpa alasan sah, informasi tidak ditanggapi hingga 10 hari kerja, biaya dipungut tidak wajar, atau informasi diberikan tidak sesuai permintaan.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-rose-50/40 border border-rose-100 space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-rose-600 text-white font-mono font-bold text-xs flex items-center justify-center">2</div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Pengajuan Ke Atasan PPID</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Surat keberatan tertulis disampaikan kepada <strong>Atasan PPID (Direktur Utama PT Bhakti Husada Wonosobo)</strong> dalam jangka waktu paling lambat 30 hari kerja setelah diterimanya tanggapan permohonan.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-rose-50/40 border border-rose-100 space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-rose-600 text-white font-mono font-bold text-xs flex items-center justify-center">3</div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Tanggapan Atasan PPID</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Atasan PPID wajib memberikan tanggapan tertulis atas pengajuan keberatan paling lambat <strong>30 Hari Kerja</strong> sejak diterimanya surat keberatan.
                    </p>
                </div>
            </div>
        </div>

        <!-- 3. SOP Penyelesaian Sengketa Informasi Publik -->
        <div class="bg-gradient-to-br from-slate-900 via-brand-dark to-teal-950 text-white p-8 sm:p-12 rounded-3xl space-y-6 shadow-xl">
            <div class="max-w-4xl space-y-3">
                <span class="text-xs font-bold text-teal-300 uppercase tracking-widest bg-white/10 px-3 py-1 rounded-full border border-white/20">SOP Eskalasi Hukum</span>
                <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">3. Tata Cara Penyelesaian Sengketa Informasi Publik</h2>
                <p class="text-xs sm:text-sm text-slate-200 leading-relaxed">
                    Apabila tanggapan atas keberatan dari Atasan PPID tidak memuaskan atau tidak ditanggapi dalam kurun 30 hari kerja, pemohon berhak mengajukan permohonan penyelesaian sengketa informasi publik kepada <strong class="text-teal-300 font-bold">Komisi Informasi Provinsi Jawa Tengah</strong>.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs pt-2">
                <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700 space-y-1">
                    <strong class="text-teal-300 font-bold block text-sm">Batas Waktu Pengajuan Sengketa:</strong>
                    <p class="text-slate-300">Maksimal 14 hari kerja setelah diterimanya surat tanggapan keberatan dari Atasan PPID.</p>
                </div>
                <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700 space-y-1">
                    <strong class="text-teal-300 font-bold block text-sm">Mekanisme Sidang Komisi Informasi:</strong>
                    <p class="text-slate-300">Melalui tahapan Mediasi (perdamaian) dan/atau Ajudikasi Non-Litigasi (putusan persidangan).</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
