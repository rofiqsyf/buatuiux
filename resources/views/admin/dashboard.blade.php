@extends('layouts.app')

@section('title', 'Admin Dashboard & Analitik PPID')

@section('content')
<!-- Header Bar with Export Action -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-heading font-extrabold text-brand">Dashboard & Analitik PPID</h1>
        <p class="text-xs text-slate-500 mt-1">Sistem Pemantauan Kinerja Layanan Informasi Publik PT Bhakti Husada Wonosobo (Perseroda)</p>
    </div>
    <a href="{{ route('admin.export-report') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition shadow-sm flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        Ekspor Laporan Monev KIP (CSV)
    </a>
</div>

<!-- Stats Overview Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm space-y-2">
        <div class="flex justify-between items-center text-xs font-semibold text-slate-500 uppercase tracking-wider">
            <span>Total Permohonan</span>
            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <h3 class="text-3xl font-heading font-extrabold text-brand">{{ $totalRequests }}</h3>
        <span class="text-[11px] text-slate-400 block">Total formulir permohonan masuk</span>
    </div>

    <div class="bg-white border border-amber-200 p-5 rounded-2xl shadow-sm space-y-2">
        <div class="flex justify-between items-center text-xs font-semibold text-amber-600 uppercase tracking-wider">
            <span>Menunggu Verifikasi</span>
            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3 class="text-3xl font-heading font-extrabold text-amber-500">{{ $pendingRequests }}</h3>
        <span class="text-[11px] text-amber-600 font-medium block">Perlu tindakan verifikasi dokumen</span>
    </div>

    <div class="bg-white border border-emerald-200 p-5 rounded-2xl shadow-sm space-y-2">
        <div class="flex justify-between items-center text-xs font-semibold text-emerald-600 uppercase tracking-wider">
            <span>Disetujui / Selesai</span>
            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h3 class="text-3xl font-heading font-extrabold text-emerald-500">{{ $approvedRequests }}</h3>
        <span class="text-[11px] text-emerald-600 font-medium block">Selesai ditanggapi petugas</span>
    </div>

    <div class="bg-white border border-teal-200 p-5 rounded-2xl shadow-sm space-y-2">
        <div class="flex justify-between items-center text-xs font-semibold text-teal-600 uppercase tracking-wider">
            <span>Katalog Dokumen DIP</span>
            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        </div>
        <h3 class="text-3xl font-heading font-extrabold text-teal-600">{{ $totalDocs }}</h3>
        <span class="text-[11px] text-slate-400 block">Dokumen publik dalam sistem</span>
    </div>
</div>

<!-- SLA Speed & Performance Metrics -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
        <div class="p-3 bg-teal-50 text-teal-700 rounded-xl">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <div>
            <span class="text-xs text-slate-400 font-semibold block">Rata-rata Waktu Respon</span>
            <span class="text-xl font-heading font-bold text-slate-800">{{ $avgSlaDays }} Hari Kerja</span>
            <span class="text-[10px] text-teal-600 font-medium block">Target Standar SLA: &le; 10 Hari</span>
        </div>
    </div>

    <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
        <div class="p-3 bg-emerald-50 text-emerald-700 rounded-xl">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <span class="text-xs text-slate-400 font-semibold block">Tingkat Ketepatan Waktu</span>
            <span class="text-xl font-heading font-bold text-emerald-600">{{ $slaOnTimePercentage }}%</span>
            <span class="text-[10px] text-slate-400 block">Selesai dalam batas waktu UU KIP</span>
        </div>
    </div>

    <div class="bg-white border border-slate-200 p-5 rounded-2xl shadow-sm flex items-center gap-4">
        <div class="p-3 {{ $nearDeadlineCount > 0 ? 'bg-rose-50 text-rose-600' : 'bg-slate-50 text-slate-500' }} rounded-xl">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <div>
            <span class="text-xs text-slate-400 font-semibold block">Mendekati Deadline (&gt;7 Hari)</span>
            <span class="text-xl font-heading font-bold {{ $nearDeadlineCount > 0 ? 'text-rose-600' : 'text-slate-800' }}">{{ $nearDeadlineCount }} Permohonan</span>
            <span class="text-[10px] text-slate-400 block">Segera selesaikan sebelum 10 hari</span>
        </div>
    </div>
</div>

<!-- Charts & Analytics Section -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8">
    <!-- Left: Traffic Analytics Trend Chart (Chart.js) -->
    <div class="lg:col-span-8 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <div class="flex justify-between items-center border-b border-slate-100 pb-3">
            <div>
                <h3 class="font-heading font-bold text-slate-800 text-base">Analitik Kunjungan Portal (7 Hari Terakhir)</h3>
                <p class="text-xs text-slate-400">Pemantauan tren partisipasi dan akses masyarakat ke portal PPID</p>
            </div>
            <div class="text-right">
                <span class="text-xs font-bold text-teal-600 bg-teal-50 px-3 py-1 rounded-full border border-teal-100">
                    Online: {{ $visitorStats['online'] }} Pengunjung
                </span>
            </div>
        </div>

        <div class="h-64 relative">
            <canvas id="trafficChart"></canvas>
        </div>

        <div class="grid grid-cols-3 gap-4 pt-2 border-t border-slate-100 text-center text-xs">
            <div>
                <span class="text-slate-400 block">Hari Ini</span>
                <span class="font-bold text-slate-800 text-sm">{{ $visitorStats['today'] }}</span>
            </div>
            <div>
                <span class="text-slate-400 block">Bulan Ini</span>
                <span class="font-bold text-teal-600 text-sm">{{ $visitorStats['month'] }}</span>
            </div>
            <div>
                <span class="text-slate-400 block">Total Kunjungan</span>
                <span class="font-bold text-slate-800 text-sm">{{ $visitorStats['total'] }}</span>
            </div>
        </div>
    </div>

    <!-- Right: DIP Document Category Distribution -->
    <div class="lg:col-span-4 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <div class="border-b border-slate-100 pb-3">
            <h3 class="font-heading font-bold text-slate-800 text-base">Distribusi Dokumen DIP</h3>
            <p class="text-xs text-slate-400">Komposisi 4 kategori informasi publik</p>
        </div>

        <div class="space-y-4 pt-1">
            <div>
                <div class="flex justify-between text-xs font-semibold mb-1">
                    <span class="text-teal-700">Berkala</span>
                    <span class="text-slate-800">{{ $categoryBreakdown['berkala'] }} dokumen</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-teal-500 h-full rounded-full" style="width: {{ $totalDocs > 0 ? round(($categoryBreakdown['berkala'] / $totalDocs) * 100) : 0 }}%"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-xs font-semibold mb-1">
                    <span class="text-sky-700">Serta Merta</span>
                    <span class="text-slate-800">{{ $categoryBreakdown['serta_merta'] }} dokumen</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-sky-500 h-full rounded-full" style="width: {{ $totalDocs > 0 ? round(($categoryBreakdown['serta_merta'] / $totalDocs) * 100) : 0 }}%"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-xs font-semibold mb-1">
                    <span class="text-emerald-700">Setiap Saat</span>
                    <span class="text-slate-800">{{ $categoryBreakdown['setiap_saat'] }} dokumen</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-emerald-500 h-full rounded-full" style="width: {{ $totalDocs > 0 ? round(($categoryBreakdown['setiap_saat'] / $totalDocs) * 100) : 0 }}%"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-xs font-semibold mb-1">
                    <span class="text-rose-700">Dikecualikan</span>
                    <span class="text-slate-800">{{ $categoryBreakdown['dikecualikan'] }} dokumen</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-rose-500 h-full rounded-full" style="width: {{ $totalDocs > 0 ? round(($categoryBreakdown['dikecualikan'] / $totalDocs) * 100) : 0 }}%"></div>
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100">
            <a href="{{ route('admin.dip-documents.index') }}" class="w-full bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold py-2 rounded-xl flex items-center justify-center gap-1.5 transition border border-slate-200 group">
                <span>Kelola Dokumen DIP</span>
                <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-teal-600 transition transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</div>

<!-- Main Table: Permohonan Masuk & Contact Messages Widget -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Left 8 cols: Permohonan Masuk -->
    <div class="lg:col-span-8 bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
            <div>
                <h2 class="text-lg font-heading font-bold text-brand">Daftar Permohonan Informasi Masuk</h2>
                <p class="text-xs text-slate-500 mt-1">Verifikasi dokumen pendukung, rincian permohonan, dan perbarui status di bawah ini</p>
            </div>
            <a href="{{ route('admin.requests.export-csv') }}" class="bg-teal-50 hover:bg-teal-100 text-teal-700 border border-teal-200 text-xs font-bold px-3.5 py-2 rounded-xl transition flex items-center gap-1.5 shrink-0 shadow-sm">
                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span>Ekspor CSV Permohonan</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">No. Tiket</th>
                        <th class="px-6 py-4">Pemohon</th>
                        <th class="px-6 py-4">Rincian Informasi</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($recentRequests as $req)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-6 py-4 font-mono text-teal-600 font-semibold text-xs">{{ $req->ticket_number }}</td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-brand text-xs">{{ $req->name }}</div>
                            <div class="text-[11px] text-slate-500 mt-0.5">{{ $req->phone }}</div>
                        </td>
                        <td class="px-6 py-4 max-w-xs truncate text-xs" title="{{ $req->information_requested }}">
                            {{ $req->information_requested }}
                        </td>
                        <td class="px-6 py-4">
                            @if($req->status === 'pending')
                                <span class="bg-amber-50 text-amber-600 border border-amber-200 text-xs px-2.5 py-0.5 rounded-full font-medium">Menunggu</span>
                            @elseif($req->status === 'processing')
                                <span class="bg-blue-50 text-blue-600 border border-blue-200 text-xs px-2.5 py-0.5 rounded-full font-medium">Diproses</span>
                            @elseif($req->status === 'approved')
                                <span class="bg-emerald-50 text-emerald-600 border border-emerald-200 text-xs px-2.5 py-0.5 rounded-full font-medium">Disetujui</span>
                            @else
                                <span class="bg-rose-50 text-rose-600 border border-rose-200 text-xs px-2.5 py-0.5 rounded-full font-medium">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="showDetailModal({{ json_encode($req) }})" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs px-3 py-1.5 rounded-lg font-semibold transition inline-flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Detail & Lampiran
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-500 text-xs">Belum ada permohonan informasi masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right 4 cols: Recent Contact Messages Widget -->
    <div class="lg:col-span-4 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
        <div class="flex justify-between items-center border-b border-slate-100 pb-3">
            <div>
                <h3 class="font-heading font-bold text-slate-800 text-base">Pesan Kontak Terbaru</h3>
                <p class="text-xs text-slate-400">Pertanyaan umum dari pengunjung</p>
            </div>
            @if($unreadContactsCount > 0)
            <span class="bg-rose-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                {{ $unreadContactsCount }} Baru
            </span>
            @endif
        </div>

        <div class="space-y-3">
            @forelse($recentContacts as $msg)
            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs space-y-1">
                <div class="flex justify-between items-center font-semibold text-slate-800">
                    <span class="truncate max-w-[140px]">{{ $msg->name }}</span>
                    <span class="font-mono text-[10px] text-teal-600 font-bold">#{{ $msg->ticket_number }}</span>
                </div>
                <p class="text-slate-600 line-clamp-1 text-[11px]">{{ $msg->title ?? $msg->message }}</p>
                <div class="flex justify-between items-center text-[10px] text-slate-400 pt-1">
                    <span>{{ $msg->topic_category ?? 'Umum' }}</span>
                    <span>{{ $msg->created_at ? $msg->created_at->diffForHumans() : '-' }}</span>
                </div>
            </div>
            @empty
            <p class="text-xs text-slate-400 italic text-center py-4">Belum ada pesan kontak masuk.</p>
            @endforelse
        </div>

        <div class="pt-2">
            <a href="{{ route('admin.contact-messages.index') }}" class="w-full bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold py-2 rounded-xl flex items-center justify-center gap-1.5 transition border border-slate-200 group">
                <span>Buka Semua Pesan Kontak</span>
                <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-teal-600 transition transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</div>

<!-- Modal Inspection & Status Update -->
<div id="detailModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-2xl relative max-h-[90vh] overflow-y-auto space-y-6">
        <div class="flex justify-between items-center border-b border-slate-200 pb-4">
            <div>
                <h3 class="font-heading font-bold text-slate-800 text-lg">Verifikasi Detail Permohonan</h3>
                <span id="modalTicket" class="font-mono text-xs text-teal-600 font-bold">#REQ-xxxx</span>
            </div>
            <button onclick="closeDetailModal()" class="text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Detail Data -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                <span class="text-slate-400 font-semibold block">Nama Pemohon:</span>
                <strong id="modalName" class="text-slate-800 text-sm">...</strong>
            </div>
            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                <span class="text-slate-400 font-semibold block">NIK (Nomor Induk Kependudukan):</span>
                <strong id="modalNik" class="text-slate-800 font-mono text-sm">...</strong>
            </div>
            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                <span class="text-slate-400 font-semibold block">Email / Telepon:</span>
                <strong id="modalContact" class="text-slate-800">...</strong>
            </div>
            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                <span class="text-slate-400 font-semibold block">Alamat Domisili:</span>
                <strong id="modalAddress" class="text-slate-800">...</strong>
            </div>
        </div>

        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-xs space-y-2">
            <div>
                <span class="text-slate-400 font-semibold block">Rincian Informasi yang Membutuhkan Layanan:</span>
                <p id="modalRincian" class="text-slate-800 font-medium leading-relaxed">...</p>
            </div>
            <div class="pt-2 border-t border-slate-200">
                <span class="text-slate-400 font-semibold block">Tujuan Penggunaan Informasi:</span>
                <p id="modalTujuan" class="text-slate-800 italic">...</p>
            </div>
        </div>

        <!-- File View/Download -->
        <div class="p-4 rounded-xl bg-teal-50/60 border border-teal-100 flex items-center justify-between">
            <div class="flex items-center gap-2 text-xs">
                <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 012-2h2a2 2 0 012 v1m-6 0h6"/></svg>
                <span class="font-bold text-slate-800">Lampiran Surat / Dokumen Pendukung</span>
            </div>
            <a id="modalAttachmentLink" href="#" target="_blank" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-3.5 py-1.5 rounded-lg transition shadow-sm">
                Buka / Download Lampiran Dokumen
            </a>
        </div>

        <!-- Update Status Form (Admin & Operator Only) -->
        @if(!auth()->check() || !auth()->user()->isPimpinan())
        <form id="modalUpdateForm" action="" method="POST" class="pt-4 border-t border-slate-200 space-y-3">
            @csrf
            <h4 class="font-bold text-xs text-brand uppercase tracking-wider">Perbarui Status Permohonan</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="block text-[11px] font-semibold text-slate-500 mb-1">Pilih Status Baru</label>
                    <select name="status" id="modalStatusSelect" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:border-teal-500">
                        <option value="pending">Pending (Menunggu)</option>
                        <option value="processing">Processing (Sedang Diproses)</option>
                        <option value="approved">Approved (Disetujui / Selesai)</option>
                        <option value="rejected">Rejected (Ditolak)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-semibold text-slate-500 mb-1">Catatan Tanggapan Petugas</label>
                    <input type="text" name="response_notes" id="modalNotesInput" placeholder="Contoh: Dokumen disetujui, silakan unduh..." class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:border-teal-500">
                </div>
            </div>
            <div class="pt-2 flex justify-end gap-2">
                <button type="button" onclick="closeDetailModal()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs px-4 py-2 rounded-xl font-semibold">Tutup</button>
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white text-xs px-5 py-2 rounded-xl font-bold shadow-sm">Simpan Perubahan Status</button>
            </div>
        </form>
        @endif
    </div>
</div>

<!-- Chart.js CDN & Chart Initialization -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('trafficChart').getContext('2d');
        const trafficChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($trafficLabels) !!},
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: {!! json_encode($trafficData) !!},
                    borderColor: '#0d9488',
                    backgroundColor: 'rgba(13, 148, 136, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#0f766e',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0 }
                    }
                }
            }
        });
    });

    function showDetailModal(req) {
        document.getElementById('modalTicket').innerText = '#' + req.ticket_number;
        document.getElementById('modalName').innerText = req.name;
        document.getElementById('modalNik').innerText = req.nik || '-';
        document.getElementById('modalContact').innerText = req.email + ' | ' + req.phone;
        document.getElementById('modalAddress').innerText = req.address || '-';
        document.getElementById('modalRincian').innerText = req.information_requested;
        document.getElementById('modalTujuan').innerText = req.purpose || '-';
        
        const attachmentBtn = document.getElementById('modalAttachmentLink');
        if (req.attachment_file_path) {
            attachmentBtn.href = '{{ asset("storage") }}/' + req.attachment_file_path;
            attachmentBtn.classList.remove('hidden');
        } else {
            attachmentBtn.classList.add('hidden');
        }

        const updateForm = document.getElementById('modalUpdateForm');
        if (updateForm) {
            updateForm.action = '{{ url("admin/requests") }}/' + req.id + '/status';
            document.getElementById('modalStatusSelect').value = req.status;
            document.getElementById('modalNotesInput').value = req.response_notes || '';
        }

        document.getElementById('detailModal').classList.remove('hidden');
        document.getElementById('detailModal').classList.add('flex');
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
        document.getElementById('detailModal').classList.remove('flex');
    }
</script>
@endsection
