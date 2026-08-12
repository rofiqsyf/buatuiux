@extends('layouts.public')

@section('title', 'Maklumat Pelayanan & Komitmen Mutu - PT Bhakti Husada Wonosobo')
@section('meta_description', 'Pernyataan Maklumat Pelayanan Resmi dan Komitmen Mutu Etika Layanan Informasi Publik Manajemen PT Bhakti Husada Wonosobo (Perseroda).')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-14 lg:py-18 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-300 mb-3">
            <a href="{{ route('home') }}" class="hover:text-teal-300 transition">Beranda</a>
            <span>&rsaquo;</span>
            <a href="{{ route('profil') }}" class="hover:text-teal-300 transition">Profil</a>
            <span>&rsaquo;</span>
            <span class="text-teal-300 font-semibold">Maklumat Pelayanan</span>
        </nav>
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl text-white">Maklumat & Komitmen Pelayanan</h1>
        <p class="text-slate-200 text-sm sm:text-base mt-2 max-w-3xl leading-relaxed">
            Pernyataan janji komitmen manajemen dan seluruh insan pengelola informasi PT Bhakti Husada Wonosobo (Perseroda) dalam mewujudkan pelayanan publik yang akuntabel, bebas pungli, dan berintegritas.
        </p>
    </div>
</section>

<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Piagam Teks Maklumat Pelayanan Resmi -->
        <div class="bg-brand-dark text-white p-8 sm:p-12 rounded-3xl border border-slate-700 shadow-xl space-y-6 text-center relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <span class="text-xs font-bold text-teal-400 uppercase tracking-widest bg-teal-950/80 px-4 py-1.5 rounded-full border border-teal-500/30">Piagam Janji Komitmen Pelayanan</span>
            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white">Maklumat Pelayanan Informasi Publik</h2>
            
            <div class="max-w-4xl mx-auto bg-slate-800/90 p-8 rounded-2xl border border-slate-700 text-slate-200 text-sm sm:text-base leading-relaxed font-serif italic shadow-inner">
                "Kami Manajemen dan Seluruh Insan Pengelola Informasi PT Bhakti Husada Wonosobo (Perseroda) menyatakan sanggup menyelenggarakan pelayanan informasi publik sesuai dengan standar pelayanan yang telah ditetapkan, memberikan pelayanan dengan penuh tanggung jawab, bersikap ramah, serta siap menerima sanksi sesuai ketentuan hukum berlaku apabila terjadi pelanggaran atas standar pelayanan yang telah dijanjikan."
            </div>
            
            <div class="pt-2 text-xs text-slate-400 font-semibold tracking-wider uppercase">
                Wonosobo, Jawa Tengah &bull; Direksi & Pengelola PPID PT Bhakti Husada Wonosobo (Perseroda)
            </div>
        </div>

        <!-- 6 Komitmen Mutu Layanan (Etika Pengelola) -->
        <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Etika & Mutu Layanan</span>
                <h2 class="font-heading font-extrabold text-xl sm:text-2xl text-slate-800 mt-1">6 Pilar Standar Etika & Pelayanan Pengelola</h2>
                <p class="text-xs text-slate-500 mt-1">Prinsip dasar yang wajib dipatuhi oleh seluruh petugas PPID saat melayani permohonan publik</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Pilar 1 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-8 h-8 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-xs">01</div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Transparansi & Kejujuran</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Memberikan informasi yang akurat, benar, dan tidak menyesatkan sesuai dokumen resmi BUMD.</p>
                </div>

                <!-- Pilar 2 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs">02</div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Nirkorupsi & Bebas Pungli</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Menjamin seluruh prosedur layanan digital 100% bebas dari pungutan liar (Zero Gratifikasi).</p>
                </div>

                <!-- Pilar 3 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-8 h-8 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-xs">03</div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Kesetaraan & Nondiskriminatif</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Melayani setiap warga negara tanpa membeda-bedakan suku, agama, ras, maupun latar belakang sosial.</p>
                </div>

                <!-- Pilar 4 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-8 h-8 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center font-bold text-xs">04</div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Prinsip 4: Perlindungan Kerahasiaan Data</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Melindungi kerahasiaan berkas pendukung dan data pribadi pemohon sesuai UU Perlindungan Data Pribadi (UU PDP).</p>
                </div>

                <!-- Pilar 5 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs">05</div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Prinsip 5: Bebas Pungli & Gratifikasi</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Menjamin seluruh proses permohonan informasi tidak dipungut biaya apapun (0 Rupiah).</p>
                </div>

                <!-- Pilar 6 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-8 h-8 rounded-xl bg-rose-100 text-rose-700 flex items-center justify-center font-bold text-xs">06</div>
                    <h3 class="font-heading font-bold text-slate-800 text-sm">Prinsip 6: Keadilan & Aksesibilitas</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Memberikan pelayanan tanpa diskriminasi kepada seluruh lapisan masyarakat dan kelompok disabilitas.</p>
                </div>
            </div>
        </div>

        <!-- Matriks Hak vs Kewajiban Pemohon Informasi -->
        <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Perimbangan Hukum</span>
                <h2 class="font-heading font-extrabold text-xl sm:text-2xl text-slate-800 mt-1">Hak & Kewajiban Pemohon Informasi Publik</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Hak Pemohon -->
                <div class="space-y-3">
                    <h3 class="font-heading font-bold text-slate-800 text-base text-teal-700 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Hak-Hak Pemohon Informasi:
                    </h3>
                    <ul class="space-y-2 text-xs text-slate-600 leading-relaxed list-disc list-inside bg-teal-50/50 p-4 rounded-2xl border border-teal-100">
                        <li>Melihat dan mengetahui dokumen informasi publik yang terdaftar dalam katalog DIP.</li>
                        <li>Mendapatkan salinan dokumen informasi publik berupa softcopy digital secara gratis.</li>
                        <li>Mendapatkan alasan tertulis yang sah apabila permohonan informasi ditolak.</li>
                        <li>Mengajukan keberatan kepada Atasan PPID apabila terjadi pelanggaran standar layanan.</li>
                    </ul>
                </div>

                <!-- Kewajiban Pemohon -->
                <div class="space-y-3">
                    <h3 class="font-heading font-bold text-slate-800 text-base text-amber-700 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        Kewajiban Pemohon Informasi:
                    </h3>
                    <ul class="space-y-2 text-xs text-slate-600 leading-relaxed list-disc list-inside bg-amber-50/50 p-4 rounded-2xl border border-amber-100">
                        <li>Melampirkan dokumen identitas resmi atau surat kuasa yang sah dan dapat dipertanggungjawabkan.</li>
                        <li>Menggunakan informasi publik yang diperoleh sesuai dengan tujuan sah yang tercantum dalam permohonan.</li>
                        <li>Mencantumkan sumber informasi publik dalam setiap kutipan atau publikasi turunan.</li>
                        <li>Tidak menyalahgunakan informasi publik untuk tindakan ilegal atau melanggar hukum.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kanal Whistleblowing System & Pengaduan Pelanggaran -->
        <div class="bg-gradient-to-br from-slate-900 via-brand-dark to-slate-900 text-white p-8 sm:p-10 rounded-3xl space-y-4 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
                <span class="text-xs font-bold text-teal-400 uppercase tracking-wider">Pengaduan Pelanggaran Etika</span>
                <h3 class="font-heading font-extrabold text-xl sm:text-2xl text-white">Menemukan Pelanggaran Etika / Pungli?</h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    Jika Anda menemukan oknum petugas PPID yang meminta imbalan, bersikap tidak sopan, atau menyalahgunakan wewenang, laporkan langsung melalui saluran pengaduan Sekretariat Internal.
                </p>
            </div>
            <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 bg-teal-500 hover:bg-teal-400 text-slate-950 text-xs font-extrabold px-6 py-3 rounded-xl transition shadow-md">
                <span>Kirim Pengaduan Etika</span>
                <svg class="w-4 h-4 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>
@endsection
