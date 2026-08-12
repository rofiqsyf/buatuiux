@extends('layouts.app')

@section('title', 'Tambah Pengguna Baru')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-xs font-bold bg-white text-slate-700 hover:text-teal-600 border border-slate-200 hover:border-teal-200 px-4 py-2 rounded-xl transition shadow-sm group">
        <svg class="w-4 h-4 text-slate-400 group-hover:text-teal-600 transition transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali ke Daftar Pengguna</span>
    </a>
</div>

<div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm max-w-2xl">
    <h2 class="text-xl font-heading font-bold text-brand mb-6">Tambah Pengguna Baru</h2>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 text-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5 text-sm">
        @csrf
        
        <div>
            <label class="block text-slate-700 mb-1.5 font-semibold">Nama Pengguna *</label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nama lengkap..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
        </div>

        <div>
            <label class="block text-slate-700 mb-1.5 font-semibold">Alamat Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@domain.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
        </div>

        <div>
            <label class="block text-slate-700 mb-1.5 font-semibold">Kata Sandi (Password) *</label>
            <div class="relative">
                <input type="password" id="userPassword" name="password" required placeholder="Minimal 6 karakter" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-3.5 pr-11 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
                <button type="button" onclick="togglePasswordVisibility('userPassword', 'eyeClosedCreate', 'eyeOpenCreate')" aria-label="Tampilkan atau sembunyikan kata sandi" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 p-1 focus:outline-none transition">
                    <svg id="eyeClosedCreate" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <svg id="eyeOpenCreate" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.02 10.02 0 013.682-.813c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18"/></svg>
                </button>
            </div>
        </div>

        <div>
            <label class="block text-slate-700 mb-1.5 font-semibold">Peran (Role) Pengguna *</label>
            <select name="role" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
                <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin Diskominfo (Full Access + User Management)</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Ketua PPID (Admin - Full CRUD & Hapus Data)</option>
                <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Petugas Layanan (Operator - CRUD Tanpa Izin Hapus)</option>
                <option value="pimpinan" {{ old('role') == 'pimpinan' ? 'selected' : '' }}>Atasan PPID (Pimpinan - Read-Only)</option>
            </select>
        </div>

        <div class="pt-4 flex gap-3">
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-sm">Simpan Pengguna</button>
            <a href="{{ route('admin.users.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-5 py-2.5 rounded-xl font-semibold transition">Batal</a>
        </div>
    </form>
</div>

<script>
    function togglePasswordVisibility(inputId, closedIconId, openIconId) {
        const input = document.getElementById(inputId);
        const closedIcon = document.getElementById(closedIconId);
        const openIcon = document.getElementById(openIconId);
        
        if (input.type === 'password') {
            input.type = 'text';
            if (closedIcon) closedIcon.classList.add('hidden');
            if (openIcon) openIcon.classList.remove('hidden');
        } else {
            input.type = 'password';
            if (closedIcon) closedIcon.classList.remove('hidden');
            if (openIcon) openIcon.classList.add('hidden');
        }
    }
</script>
@endsection
