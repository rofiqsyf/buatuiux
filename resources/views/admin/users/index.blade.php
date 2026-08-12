@extends('layouts.app')

@section('title', 'Kelola Pengguna Sistem (User Management)')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-heading font-bold text-brand">Kelola Pengguna Sistem (User Management)</h2>
        <p class="text-sm text-slate-500 mt-1">Khusus Super Admin: Kelola seluruh akun, role, dan hak akses pengguna sistem PPID</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-bold transition text-sm shadow-sm flex items-center gap-2">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
        Tambah Pengguna Baru
    </a>
</div>

@if(session('error'))
    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="p-4 bg-slate-50/50 border-b border-slate-200">
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex items-center gap-3">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama atau email pengguna..." class="bg-white border border-slate-300 rounded-xl px-4 py-2 text-xs text-slate-700 focus:outline-none focus:border-teal-500 w-72">
            <button type="submit" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs px-4 py-2 rounded-xl font-semibold transition">Cari</button>
            @if($search)
            <a href="{{ route('admin.users.index') }}" class="text-xs text-slate-500 hover:text-slate-700">Reset</a>
            @endif
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">Nama Pengguna</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Peran (Role)</th>
                    <th class="px-6 py-4">Tanggal Dibuat</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($users as $u)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="px-6 py-4 font-bold text-brand">
                        {{ $u->name }}
                        @if(auth()->id() === $u->id)
                            <span class="text-[10px] bg-teal-100 text-teal-800 font-extrabold px-2 py-0.5 rounded-full ml-1">(Anda)</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-mono text-xs text-slate-600">{{ $u->email }}</td>
                    <td class="px-6 py-4">
                        @if($u->role === 'superadmin' || $u->email === 'admin@diskominfo.wonosobokab.go.id')
                            <span class="bg-purple-50 text-purple-700 border border-purple-200 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase">Super Admin</span>
                        @elseif($u->role === 'admin')
                            <span class="bg-rose-50 text-rose-700 border border-rose-200 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase">Admin PPID</span>
                        @elseif($u->role === 'operator')
                            <span class="bg-teal-50 text-teal-700 border border-teal-200 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase">Petugas Layanan</span>
                        @else
                            <span class="bg-blue-50 text-blue-700 border border-blue-200 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase">Pimpinan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-xs text-slate-500">
                        {{ $u->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="text-teal-600 hover:text-teal-700 mr-3 text-xs font-bold uppercase tracking-wider">Edit</a>
                        @if(auth()->id() !== $u->id)
                        <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $u->name }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-bold uppercase tracking-wider">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-slate-500">Belum ada pengguna terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
    <div class="p-4 border-t border-slate-100">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
