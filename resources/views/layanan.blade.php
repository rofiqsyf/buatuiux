@extends('layouts.public')

@section('title', 'Portal Layanan E-PPID Interaktif — PT Bhakti Husada Wonosobo')
@section('meta_description', 'Pusat Akses Layanan Informasi Publik Digital PT Bhakti Husada Wonosobo. Pengajuan permohonan online, live tracking status tiket, dan FAQ layanan.')

@section('content')
<!-- Page Banner Header -->
<section class="hero-gradient text-white py-14 lg:py-18 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-30 mix-blend-overlay" style="background-image: url('{{ asset('assets/Gambar PT Bhakti Husada.jpg') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-brand-dark/95 via-brand-dark/80 to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-300 mb-3">
            <a href="{{ route('home') }}" class="hover:text-teal-300 transition">Beranda</a>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-teal-300 font-semibold">Portal Layanan Digital</span>
        </nav>
        
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl lg:text-5xl text-white leading-tight">
            Portal Layanan E-PPID Digital
        </h1>
        <p class="text-slate-200 text-sm sm:text-base mt-2 max-w-2xl leading-relaxed">
            Pusat akses mandiri untuk mengajukan permohonan informasi publik, melacak tiket permohonan secara real-time, dan mendapatkan bantuan layanan online 24 jam.
        </p>
    </div>
</section>

<!-- Status Layanan Bar -->
<section class="-mt-6 relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
            </span>
            <div>
                <span class="font-heading font-bold text-slate-800 text-sm sm:text-base">Sistem Pelayanan Informasi:</span>
                <span class="ml-2 bg-emerald-100 text-emerald-800 font-extrabold text-xs px-2.5 py-0.5 rounded-full uppercase tracking-wider">ONLINE & SIAP MELAYANI</span>
            </div>
        </div>
        <div class="flex items-center gap-2 text-xs text-slate-500 font-semibold">
            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
            <span>Jam Operasional Sekretariat: Senin – Jumat (08.00 – 15.00 WIB)</span>
        </div>
    </div>
</section>

<!-- Main Interactive Hub Section -->
<section class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        <!-- 3 Quick Action Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <!-- Action 1: Permohonan Online -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition space-y-5">
                <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <div>
                    <h2 class="font-heading font-bold text-slate-800 text-lg">1. Buat Permohonan Baru</h2>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Isi formulir digital permohonan informasi publik dengan melampirkan Lampiran Surat / Dokumen Pendukung.</p>
                </div>
                <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100 text-xs space-y-1.5 text-slate-600">
                    <div class="flex items-center gap-1.5"><span class="text-teal-600 font-bold">✓</span> Bebas Biaya Layanan (Gratis)</div>
                    <div class="flex items-center gap-1.5"><span class="text-teal-600 font-bold">✓</span> Bukti Tiket Otomatis (`#REQ-...`)</div>
                </div>
                <a href="{{ route('request.create') }}" class="flex items-center justify-center gap-2 w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-xl text-xs transition shadow-sm">
                    <span>Buka Formulir Permohonan</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Action 2: Live Tracking In-Page Widget -->
            <div class="bg-white p-7 rounded-3xl border border-teal-200/80 shadow-md space-y-5 lg:col-span-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center font-bold shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <div>
                            <h2 class="font-heading font-bold text-slate-800 text-lg">2. Live Tracking Status Permohonan</h2>
                            <p class="text-xs text-slate-500">Masukkan nomor tiket permohonan (`#REQ-...`) atau pertanyaan (`#INQ-...`)</p>
                        </div>
                    </div>
                    <span class="text-[11px] bg-sky-100 text-sky-800 font-bold px-2.5 py-1 rounded-full uppercase hidden sm:inline-block">Realtime API</span>
                </div>

                <!-- Direct Search Input -->
                <form onsubmit="submitInlineTracking(event)" class="space-y-4">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <input type="text" id="inlineTicketInput" required placeholder="Contoh: REQ-20260805-A1B2 atau INQ-..." class="flex-grow bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 font-mono text-slate-800">
                        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-bold px-6 py-3 rounded-xl text-xs transition shrink-0 shadow-sm">
                            Cek Status Tiket
                        </button>
                    </div>
                </form>

                <!-- Live Result Container -->
                <div id="inlineTrackingResult" class="hidden p-5 rounded-2xl border text-xs"></div>
            </div>

        </div>

        <!-- Syarat & Ketentuan Berkas Permohonan -->
        <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Persyaratan Berkas</span>
                <h2 class="font-heading font-extrabold text-xl sm:text-2xl text-slate-800 mt-1">Syarat Dokumen Kelengkapan Pemohon</h2>
                <p class="text-xs text-slate-500 mt-1">Pastikan berkas Lampiran Surat / Dokumen Pendukung yang diunggah memenuhi kriteria berikut</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Pemohon Perorangan -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-teal-600 text-white font-bold text-xs flex items-center justify-center">A</span>
                        <h3 class="font-heading font-bold text-slate-800 text-base">Pemohon Perorangan (Individu)</h3>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 leading-relaxed list-disc list-inside">
                        <li>Mengunggah <strong>Lampiran Surat / Dokumen Pendukung</strong> yang sah.</li>
                        <li>Dokumen terbaca jelas dan tidak buram (Format PDF, DOC, DOCX, JPG, PNG maks. 5 MB).</li>
                        <li>Mencantumkan rincian informasi dan tujuan penggunaan secara spesifik.</li>
                    </ul>
                </div>

                <!-- Pemohon Lembaga / Ormas -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-xl bg-teal-600 text-white font-bold text-xs flex items-center justify-center">B</span>
                        <h3 class="font-heading font-bold text-slate-800 text-base">Pemohon Lembaga / Ormas / Badan Hukum</h3>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 leading-relaxed list-disc list-inside">
                        <li>Mengunggah <strong>Lampiran Surat / Dokumen Pendukung</strong> (Akta Notaris / Surat Permohonan / Surat Kuasa Organisasi).</li>
                        <li>Dokumen terbaca jelas dan tidak buram (Format PDF, DOC, DOCX, JPG, PNG maks. 5 MB).</li>
                        <li>Mencantumkan rincian informasi dan tujuan penggunaan yang jelas.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FAQ Accordion (Pusat Bantuan Layanan) -->
        <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Pusat Bantuan</span>
                <h2 class="font-heading font-extrabold text-xl sm:text-2xl text-slate-800 mt-1">Pertanyaan Yang Sering Diajukan (FAQ Layanan Digital)</h2>
            </div>

            <div class="space-y-3">
                <details class="bg-slate-50 border border-slate-200 rounded-2xl p-4 group transition duration-200">
                    <summary class="font-heading font-bold text-slate-800 text-sm cursor-pointer flex justify-between items-center select-none">
                        <span>Bagaimana cara melacak permohonan saya?</span>
                        <span class="w-5 h-5 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 group-open:rotate-180 transition transform text-xs">▼</span>
                    </summary>
                    <div class="text-xs text-slate-600 leading-relaxed mt-2.5 pt-2.5 border-t border-slate-200/60">
                        Gunakan widget <strong>Live Tracking Status</strong> di bagian atas halaman ini atau klik tombol "Lacak Tiket" di bagian navigasi atas. Masukkan nomor tiket permohonan yang Anda dapatkan saat pengajuan.
                    </div>
                </details>

                <details class="bg-slate-50 border border-slate-200 rounded-2xl p-4 group transition duration-200">
                    <summary class="font-heading font-bold text-slate-800 text-sm cursor-pointer flex justify-between items-center select-none">
                        <span>Apakah permohonan informasi digital ini dipungut biaya?</span>
                        <span class="w-5 h-5 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 group-open:rotate-180 transition transform text-xs">▼</span>
                    </summary>
                    <div class="text-xs text-slate-600 leading-relaxed mt-2.5 pt-2.5 border-t border-slate-200/60">
                        Seluruh layanan permohonan informasi digital dan pengiriman softcopy via email <strong>100% GRATIS (0 Rupiah)</strong>.
                    </div>
                </details>

                <details class="bg-slate-50 border border-slate-200 rounded-2xl p-4 group transition duration-200">
                    <summary class="font-heading font-bold text-slate-800 text-sm cursor-pointer flex justify-between items-center select-none">
                        <span>Di mana saya dapat melihat panduan alur SOP dan cara pengajuan keberatan?</span>
                        <span class="w-5 h-5 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 group-open:rotate-180 transition transform text-xs">▼</span>
                    </summary>
                    <div class="text-xs text-slate-600 leading-relaxed mt-2.5 pt-2.5 border-t border-slate-200/60">
                        Panduan dokumentasi alur SOP lengkap, tata cara pengajuan keberatan, dan mekanisme penyelesaian sengketa informasi dapat Anda baca secara detail pada menu <a href="{{ route('prosedur.public') }}" class="text-teal-600 font-bold hover:underline">Alur & Prosedur Layanan</a>.
                    </div>
                </details>
            </div>
        </div>

    </div>
</section>

<script>
async function submitInlineTracking(e) {
    e.preventDefault();
    const ticket = document.getElementById('inlineTicketInput').value;
    const resDiv = document.getElementById('inlineTrackingResult');
    resDiv.classList.remove('hidden');
    resDiv.className = "p-4 rounded-2xl border bg-slate-50 border-slate-200 text-slate-600 text-center text-xs animate-pulse";
    resDiv.innerHTML = "Memeriksa database permohonan...";

    try {
        const response = await fetch('{{ route("tracking.search") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ ticket: ticket })
        });
        const data = await response.json();

        if (data.found) {
            resDiv.className = "p-4 rounded-2xl border border-teal-200 bg-teal-50/70 text-slate-700 text-xs space-y-2";
            resDiv.innerHTML = `
                <div class="flex justify-between items-center border-b border-teal-200/80 pb-2">
                    <span class="font-mono font-bold text-teal-800 text-sm">#${data.ticket_number}</span>
                    <span class="bg-teal-600 text-white font-bold text-[10px] px-3 py-1 rounded-full uppercase">${data.status_label}</span>
                </div>
                <div><strong class="text-slate-900">Nama Pemohon:</strong> ${data.name}</div>
                <div><strong class="text-slate-900">Tahapan Proses:</strong> ${data.stage}</div>
                <div><strong class="text-slate-900">Estimasi Selesai:</strong> ${data.estimate}</div>
                ${data.response_notes ? `<div class="mt-2 p-3 bg-white rounded-xl border border-teal-100 text-slate-800"><strong>Catatan Petugas:</strong> ${data.response_notes}</div>` : ''}
            `;
        } else {
            resDiv.className = "p-4 rounded-2xl border border-rose-200 bg-rose-50 text-rose-700 text-xs text-center font-medium";
            resDiv.innerHTML = data.message || "Nomor tiket tidak ditemukan dalam database.";
        }
    } catch (err) {
        resDiv.className = "p-4 rounded-2xl border border-rose-200 bg-rose-50 text-rose-700 text-xs text-center font-medium";
        resDiv.innerHTML = "Terjadi kesalahan koneksi ke server.";
    }
}
</script>
@endsection
