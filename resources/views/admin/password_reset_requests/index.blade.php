@extends('layouts.app')

@section('title', 'Permohonan Reset Password - Super Admin Panel')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <div class="flex items-center gap-2">
            <h2 class="text-xl font-heading font-bold text-brand">Permohonan Reset Kata Sandi</h2>
            <span class="bg-purple-100 text-purple-800 text-[10px] font-extrabold px-2.5 py-0.5 rounded-full uppercase border border-purple-200">Super Admin Only</span>
        </div>
        <p class="text-xs text-slate-500 mt-1">Daftar pengajuan reset kata sandi dari petugas/admin yang membutuhkan verifikasi Super Admin</p>
    </div>
</div>

@if(session('success_reset'))
<div class="mb-6 p-5 rounded-2xl bg-teal-50 border border-teal-200 text-slate-800 space-y-2 shadow-sm">
    <div class="flex items-center gap-2 font-bold text-teal-800 text-base">
        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>{{ session('success_reset')['message'] }}</span>
    </div>
    <div class="p-3 bg-white rounded-xl border border-teal-100 text-xs space-y-1 font-mono">
        <div><strong class="text-slate-500">Email Akun:</strong> <span class="text-slate-800 font-bold select-all">{{ session('success_reset')['email'] }}</span></div>
        <div><strong class="text-slate-500">Kata Sandi Baru:</strong> <span class="text-teal-700 font-extrabold text-sm select-all">{{ session('success_reset')['new_password'] }}</span></div>
    </div>
    <p class="text-[11px] text-slate-500">Silakan sampaikan kata sandi baru di atas kepada pemilik akun untuk digunakan saat login.</p>
</div>
@endif

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <!-- Filter Header -->
    <div class="p-4 bg-slate-50/50 border-b border-slate-200 flex items-center justify-between">
        <div class="flex flex-wrap gap-2 text-xs font-semibold">
            <a href="{{ route('admin.password-reset-requests.index', ['status' => 'all']) }}" class="px-3.5 py-1.5 rounded-xl border transition {{ $status === 'all' ? 'bg-purple-700 text-white border-purple-700 shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                Semua Permohonan
            </a>
            <a href="{{ route('admin.password-reset-requests.index', ['status' => 'pending']) }}" class="px-3.5 py-1.5 rounded-xl border transition {{ $status === 'pending' ? 'bg-amber-500 text-white border-amber-500 shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                Pending / Menunggu
            </a>
            <a href="{{ route('admin.password-reset-requests.index', ['status' => 'approved']) }}" class="px-3.5 py-1.5 rounded-xl border transition {{ $status === 'approved' ? 'bg-teal-600 text-white border-teal-600 shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                Disetujui
            </a>
            <a href="{{ route('admin.password-reset-requests.index', ['status' => 'rejected']) }}" class="px-3.5 py-1.5 rounded-xl border transition {{ $status === 'rejected' ? 'bg-rose-600 text-white border-rose-600 shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-100' }}">
                Ditolak
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">Pengaju / Akun</th>
                    <th class="px-6 py-4">Role Akun</th>
                    <th class="px-6 py-4">Alasan Permohonan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Tanggal Pengajuan</th>
                    <th class="px-6 py-4 text-right">Aksi Super Admin</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($requests as $req)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800 text-sm">{{ $req->user ? $req->user->name : 'User' }}</div>
                        <div class="text-xs font-mono text-teal-600">{{ $req->email }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">
                            {{ $req->user ? $req->user->role : 'Unknown' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 max-w-xs">
                        <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed" title="{{ $req->reason }}">{{ $req->reason }}</p>
                        @if($req->admin_notes)
                            <div class="text-[10px] text-slate-400 mt-1 italic">Catatan Admin: {{ $req->admin_notes }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($req->status === 'pending')
                            <span class="bg-amber-50 text-amber-600 border border-amber-200 text-xs px-2.5 py-0.5 rounded-full font-bold">Pending</span>
                        @elseif($req->status === 'approved')
                            <span class="bg-teal-50 text-teal-700 border border-teal-200 text-xs px-2.5 py-0.5 rounded-full font-bold">Disetujui</span>
                        @else
                            <span class="bg-rose-50 text-rose-600 border border-rose-200 text-xs px-2.5 py-0.5 rounded-full font-bold">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-xs text-slate-500 whitespace-nowrap">
                        {{ $req->created_at ? $req->created_at->format('d/m/Y H:i') : '-' }}
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap space-x-2">
                        @if($req->status === 'pending')
                            <button onclick="openApproveModal({{ json_encode($req) }})" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg transition shadow-sm">
                                Setujui & Reset
                            </button>
                            <form action="{{ route('admin.password-reset-requests.reject', $req->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tolak permohonan reset kata sandi ini?');">
                                @csrf
                                <button type="submit" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-semibold px-3 py-1.5 rounded-lg transition">
                                    Tolak
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.password-reset-requests.destroy', $req->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus riwayat permohonan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-semibold uppercase tracking-wider">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-500 text-xs">Belum ada permohonan reset kata sandi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($requests->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $requests->links() }}
    </div>
    @endif
</div>

<!-- Modal Approve & Reset Password -->
<div id="approveModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl space-y-4">
        <div class="flex justify-between items-center border-b border-slate-200 pb-3">
            <h3 class="font-heading font-bold text-slate-800 text-base">Setujui & Reset Kata Sandi</h3>
            <button onclick="closeApproveModal()" class="text-slate-400 hover:text-slate-600 p-1">✕</button>
        </div>

        <form id="approveForm" action="" method="POST" class="space-y-4 text-xs">
            @csrf
            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 space-y-1">
                <span class="text-slate-400 font-semibold block">Pemohon:</span>
                <strong id="approveModalUser" class="text-slate-800 text-sm">...</strong>
            </div>

            <div>
                <label class="block font-semibold text-slate-700 mb-1">Kata Sandi Baru (Kosongkan untuk auto-generate)</label>
                <input type="text" name="new_password" placeholder="Contoh: Bhakti2026!" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-800 font-mono focus:outline-none focus:border-teal-500">
                <p class="text-[10px] text-slate-400 mt-1">Jika dikosongkan, sistem akan membuat kata sandi acak otomatis.</p>
            </div>

            <div>
                <label class="block font-semibold text-slate-700 mb-1">Catatan Admin (Opsional)</label>
                <input type="text" name="admin_notes" placeholder="Catatan internal..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-teal-500">
            </div>

            <div class="pt-2 flex justify-end gap-2">
                <button type="button" onclick="closeApproveModal()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold px-4 py-2 rounded-xl">Batal</button>
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-5 py-2 rounded-xl shadow-sm">Proses Reset Kata Sandi</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openApproveModal(req) {
        document.getElementById('approveModalUser').innerText = (req.user ? req.user.name : 'User') + ' (' + req.email + ')';
        document.getElementById('approveForm').action = '{{ url("admin/password-reset-requests") }}/' + req.id + '/approve';
        document.getElementById('approveModal').classList.remove('hidden');
        document.getElementById('approveModal').classList.add('flex');
    }

    function closeApproveModal() {
        document.getElementById('approveModal').classList.add('hidden');
        document.getElementById('approveModal').classList.remove('flex');
    }
</script>
@endsection
