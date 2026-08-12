@extends('layouts.public')

@section('title', 'Profil & Struktur Organisasi - PT Bhakti Husada Wonosobo')

@section('content')
<section class="hero-gradient text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl text-white">Profil Layanan Informasi Publik PT Bhakti Husada Wonosobo</h1>
        <p class="text-slate-200 text-xs sm:text-sm mt-2 max-w-3xl">
            Layanan Informasi Publik PT Bhakti Husada Wonosobo diselenggarakan berdasarkan amanat UU No. 14 Tahun 2008 dan Surat Permohonan Fasilitasi Resmi No. 800.A/20/PT-BH018/VII/2026 kepada Dinas Komunikasi dan Informatika Kabupaten Wonosobo.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Visi Misi -->
        <div id="visi-misi" class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-6 scroll-mt-28">
            <div>
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Komitmen Pelayanan</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">Visi & Misi Pelayanan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-teal-50/60 border border-teal-100 p-6 rounded-2xl space-y-3">
                    <h3 class="font-heading font-bold text-teal-800 text-lg">Visi</h3>
                    <p class="text-xs text-slate-700 leading-relaxed">
                        Terwujudnya tata kelola perusahaan yang baik (*Good Corporate Governance*) serta pelayanan informasi publik yang transparan, akuntabel, dan mudah diakses oleh seluruh masyarakat Kabupaten Wonosobo.
                    </p>
                </div>

                <div class="bg-slate-50 border border-slate-200 p-6 rounded-2xl space-y-3">
                    <h3 class="font-heading font-bold text-slate-800 text-lg">Misi</h3>
                    <ul class="text-xs text-slate-700 leading-relaxed space-y-2 list-disc list-inside">
                        <li>Mengatur dan menyediakan informasi publik secara efektif, efisien, dan berkesinambungan.</li>
                        <li>Mempermudah akses masyarakat terhadap dokumen publik BUMD secara daring.</li>
                        <li>Meningkatkan sinergi antar-perangkat daerah bersama Diskominfo Kabupaten Wonosobo.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tugas & Fungsi -->
        <div id="tugas" class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-6 scroll-mt-28">
            <div>
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Wewenang Operasional</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">Tugas & Fungsi Utama Operasional</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs leading-relaxed text-slate-700">
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <h3 class="font-bold text-brand text-sm">1. Penyediaan Informasi</h3>
                    <p>Mengkoordinasikan pengumpulan, pendataan, dan klasifikasi seluruh dokumen informasi publik dari setiap unit kerja PT Bhakti Husada Wonosobo (Perseroda).</p>
                </div>
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <h3 class="font-bold text-brand text-sm">2. Pelayanan Permohonan</h3>
                    <p>Menerima, memproses, dan memverifikasi permohonan informasi publik serta pengajuan keberatan warga masyarakat secara transparan dan akuntabel.</p>
                </div>
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <h3 class="font-bold text-brand text-sm">3. Pengujian Kualifikasi</h3>
                    <p>Melakukan pengujian konsekuensi informasi publik yang dikecualikan sesuai dengan amanat UU KIP No. 14 Tahun 2008.</p>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi -->
        <div id="struktur" class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-6 scroll-mt-28">
            <div>
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Tata Kelola Peran</span>
                <h2 class="font-heading font-extrabold text-2xl text-slate-800 mt-1">Struktur Organisasi Pelayanan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-14 h-14 rounded-full bg-slate-200 text-slate-800 font-extrabold flex items-center justify-center mx-auto text-base">S</div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Direktur Perusahaan</h3>
                    <p class="text-xs text-teal-600 font-bold">Sumali Ibnu Chamid, S.Sos.I</p>
                    <p class="text-[11px] text-slate-500 pt-1">Pengarah & Pengawas Utama Layanan Informasi Publik</p>
                </div>

                <div class="p-6 rounded-2xl bg-teal-50 border border-teal-200 space-y-2">
                    <div class="w-14 h-14 rounded-full bg-teal-600 text-white font-extrabold flex items-center justify-center mx-auto text-base">A</div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Ketua Tim Informasi (Admin)</h3>
                    <p class="text-xs text-teal-700 font-bold">Admin Utama Sistem</p>
                    <p class="text-[11px] text-slate-500 pt-1">Penanggung Jawab Operasional & Pengolah Dokumen DIP</p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <div class="w-14 h-14 rounded-full bg-slate-200 text-slate-800 font-extrabold flex items-center justify-center mx-auto text-base">P</div>
                    <h3 class="font-heading font-bold text-slate-800 text-base">Petugas Layanan (Operator)</h3>
                    <p class="text-xs text-teal-600 font-bold">Tim Meja Layanan Informasi</p>
                    <p class="text-[11px] text-slate-500 pt-1">Verifikator Identitas & Pelaksana Permohonan Publik</p>
                </div>
            </div>
        </div>

        <!-- Landasan Legalitas & Fasilitasi -->
        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-brand text-lg">Landasan Fasilitasi Domain & Server Official</h3>
            <div class="bg-slate-50 p-4.5 rounded-2xl border border-slate-200 text-xs text-slate-700 space-y-2">
                <p><strong>Nomor Surat Permohonan:</strong> 800.A/20/PT-BH018/VII/2026</p>
                <p><strong>Tanggal Surat:</strong> 7 Juli 2026</p>
                <p><strong>Fasilitasi Instansi:</strong> Dinas Komunikasi dan Informatika (Diskominfo) Kabupaten Wonosobo</p>
                <p><strong>Alamat Kantor Resmi:</strong> Jln. RSU No. 16, Kabupaten Wonosobo, Jawa Tengah (Telp: 0286 321134)</p>
            </div>
        </div>

        <!-- Maklumat Pelayanan -->
        <div id="maklumat" class="bg-brand-900 text-white p-8 sm:p-12 rounded-3xl space-y-4 text-center scroll-mt-28">
            <span class="text-xs font-bold text-teal-400 uppercase tracking-widest">Maklumat Pelayanan</span>
            <h2 class="font-heading font-extrabold text-xl sm:text-2xl">Komitmen Maklumat Informasi Publik</h2>
            <p class="text-xs sm:text-sm text-slate-300 max-w-3xl mx-auto leading-relaxed">
                "Kami Manajemen dan Pengelola Informasi PT Bhakti Husada Wonosobo (Perseroda) berkomitmen untuk memberikan pelayanan informasi publik secara sungguh-sungguh, akurat, santun, transparan, dan tidak memungut biaya tidak sah demi kepuasan masyarakat."
            </p>
        </div>

    </div>
</section>
@endsection
