@extends('layouts.app')

@section('title', 'Kotak Masuk & Pengaduan')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h2 class="text-xl font-heading font-bold text-brand">Kotak Masuk & Pengaduan Publik</h2>
        <p class="text-sm text-slate-500 mt-1">Daftar masukan, pertanyaan, dan pengaduan masyarakat yang masuk dari portal PPID</p>
    </div>
    <a href="{{ route('admin.contact-messages.export-csv') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition shadow-sm flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        <span>Ekspor CSV Kotak Masuk</span>
    </a>
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <!-- Search Header -->
    <div class="p-4 bg-slate-50/50 border-b border-slate-200 flex items-center justify-between">
        <form action="{{ route('admin.contact-messages.index') }}" method="GET" class="flex items-center gap-3">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama, email, tiket INQ, atau subjek..." class="bg-white border border-slate-300 rounded-xl px-4 py-2 text-xs text-slate-700 focus:outline-none focus:border-teal-500 w-80">
            <button type="submit" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs px-4 py-2 rounded-xl font-semibold transition">Cari Pesan</button>
            @if($search)
            <a href="{{ route('admin.contact-messages.index') }}" class="text-xs text-slate-500 hover:text-slate-700">Reset</a>
            @endif
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">No. Tiket Inquiry</th>
                    <th class="px-6 py-4">Pengirim</th>
                    <th class="px-6 py-4">Kategori & Subjek</th>
                    <th class="px-6 py-4">Isi Pesan</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($messages as $msg)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="px-6 py-4 font-mono text-teal-600 font-bold text-xs">
                        {{ $msg->ticket_number ?? 'INQ-' . $msg->id }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-brand text-sm">{{ $msg->name }}</div>
                        <div class="text-xs text-slate-500 mt-0.5">{{ $msg->email }} | {{ $msg->phone ?? '-' }}</div>
                        <span class="inline-block mt-1 text-[10px] bg-slate-100 text-slate-600 font-medium px-2 py-0.5 rounded-full capitalize">{{ $msg->applicant_category ?? 'Perorangan' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-teal-50 text-teal-700 border border-teal-100 text-xs px-2.5 py-0.5 rounded-full font-semibold block w-fit mb-1">{{ $msg->topic_category ?? $msg->subject }}</span>
                        <div class="font-bold text-slate-800 text-xs truncate max-w-xs">{{ $msg->title ?? $msg->subject }}</div>
                    </td>
                    <td class="px-6 py-4 max-w-md">
                        <p class="text-slate-600 text-xs leading-relaxed line-clamp-2">{{ $msg->message }}</p>
                        @if($msg->attachment_path)
                        <div class="mt-1.5">
                            <a href="{{ asset('storage/' . $msg->attachment_path) }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-bold text-teal-600 hover:text-teal-700">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                Lihat Lampiran Berkas
                            </a>
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-xs text-slate-500 whitespace-nowrap">
                        {{ $msg->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        <button onclick="showContactModal({{ json_encode($msg) }})" class="text-teal-600 hover:text-teal-700 mr-3 text-xs font-bold uppercase tracking-wider">Detail</button>
                        @if(!auth()->check() || auth()->user()->isAdmin())
                        <form action="{{ route('admin.contact-messages.destroy', $msg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-bold uppercase tracking-wider">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-500">Belum ada pesan atau pengaduan yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($messages->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $messages->links() }}
    </div>
    @endif
</div>

<!-- Modal Contact Message Detail -->
<div id="contactModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-xl w-full p-6 shadow-2xl relative space-y-4">
        <div class="flex justify-between items-center border-b border-slate-200 pb-3">
            <div>
                <h3 class="font-heading font-bold text-slate-800 text-base">Detail Pesan Masuk</h3>
                <span id="modalMsgTicket" class="font-mono text-xs text-teal-600 font-bold">#INQ-xxxx</span>
            </div>
            <button onclick="closeContactModal()" class="text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="space-y-3 text-xs">
            <div class="grid grid-cols-2 gap-3 bg-slate-50 p-3 rounded-xl border border-slate-100">
                <div>
                    <span class="text-slate-400 font-semibold block">Pengirim:</span>
                    <strong id="modalMsgName" class="text-slate-800 text-sm">...</strong>
                </div>
                <div>
                    <span class="text-slate-400 font-semibold block">Kontak (Email / Telp):</span>
                    <strong id="modalMsgContact" class="text-slate-800">...</strong>
                </div>
            </div>

            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                <span class="text-slate-400 font-semibold block">Kategori / Subjek:</span>
                <strong id="modalMsgTopic" class="text-teal-700 font-bold text-sm">...</strong>
            </div>

            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 space-y-1">
                <span class="text-slate-400 font-semibold block">Isi Pesan Utuh:</span>
                <p id="modalMsgText" class="text-slate-800 leading-relaxed font-medium whitespace-pre-line">...</p>
            </div>

            <div id="modalAttachmentDiv" class="p-3 rounded-xl bg-teal-50 border border-teal-100 flex items-center justify-between hidden">
                <span class="font-bold text-slate-800 text-xs">Lampiran Berkas Pengirim</span>
                <a id="modalAttachmentLink" href="#" target="_blank" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg transition">Download Berkas</a>
            </div>
        </div>

        <div class="pt-3 border-t border-slate-200 text-right">
            <button onclick="closeContactModal()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs px-4 py-2 rounded-xl font-semibold">Tutup</button>
        </div>
    </div>
</div>

<script>
    function showContactModal(msg) {
        document.getElementById('modalMsgTicket').innerText = '#' + (msg.ticket_number || ('INQ-' + msg.id));
        document.getElementById('modalMsgName').innerText = msg.name;
        document.getElementById('modalMsgContact').innerText = msg.email + ' | ' + (msg.phone || '-');
        document.getElementById('modalMsgTopic').innerText = (msg.topic_category || msg.subject) + ' — ' + (msg.title || '');
        document.getElementById('modalMsgText').innerText = msg.message;

        const attachDiv = document.getElementById('modalAttachmentDiv');
        const attachLink = document.getElementById('modalAttachmentLink');

        if (msg.attachment_path) {
            attachLink.href = '{{ asset("storage") }}/' + msg.attachment_path;
            attachDiv.classList.remove('hidden');
        } else {
            attachDiv.classList.add('hidden');
        }

        document.getElementById('contactModal').classList.remove('hidden');
        document.getElementById('contactModal').classList.add('flex');
    }

    function closeContactModal() {
        document.getElementById('contactModal').classList.add('hidden');
        document.getElementById('contactModal').classList.remove('flex');
    }
</script>
@endsection
