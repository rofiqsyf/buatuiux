@extends('layouts.app')

@section('title', 'Kelola Berita & Publikasi Kegiatan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-xl font-heading font-bold text-brand">Kelola Berita & Publikasi Kegiatan</h2>
        <p class="text-sm text-slate-500 mt-1">Daftar artikel berita, pengumuman, dan publikasi resmi</p>
    </div>
    @if(!auth()->check() || !auth()->user()->isPimpinan())
    <a href="{{ route('admin.news.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-bold transition text-sm shadow-sm flex items-center gap-2">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
        Tambah Berita Baru
    </a>
    @endif
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">Sampul</th>
                    <th class="px-6 py-4">Judul & Ringkasan Berita</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Tanggal Publikasi</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($news as $item)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="px-6 py-4">
                        @if($item->image_url)
                            <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->title }}" class="w-14 h-10 object-cover rounded-lg border border-slate-200 shadow-xs">
                        @else
                            <div class="w-14 h-10 bg-slate-100 rounded-lg border border-slate-200 flex items-center justify-center text-slate-400 text-[10px] font-semibold">No Image</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-brand text-sm leading-snug">{{ $item->title }}</div>
                        <div class="text-xs text-slate-500 mt-1 truncate max-w-md" title="{{ $item->summary }}">{{ $item->summary }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-teal-50 text-teal-700 border border-teal-100 text-xs px-2.5 py-0.5 rounded-full font-semibold">{{ $item->category }}</span>
                    </td>
                    <td class="px-6 py-4 text-xs text-slate-500 whitespace-nowrap">{{ date('d M Y', strtotime($item->published_at)) }}</td>
                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        @if(!auth()->check() || !auth()->user()->isPimpinan())
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="text-teal-600 hover:text-teal-700 mr-3 text-xs font-bold uppercase tracking-wider">Edit</a>
                            @if(!auth()->check() || auth()->user()->isAdmin())
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-600 text-xs font-bold uppercase tracking-wider">Hapus</button>
                            </form>
                            @endif
                        @else
                            <span class="text-xs text-slate-400 italic">Hanya lihat</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-slate-500">Belum ada berita yang dipublikasikan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
