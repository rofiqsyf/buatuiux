@extends('layouts.app')

@section('title', 'Edit Berita & SEO Editor')

<!-- Quill Rich Text Editor CDN -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.news.index') }}" class="inline-flex items-center gap-2 text-xs font-bold bg-white text-slate-700 hover:text-teal-600 border border-slate-200 hover:border-teal-200 px-4 py-2 rounded-xl transition shadow-sm group">
        <svg class="w-4 h-4 text-slate-400 group-hover:text-teal-600 transition transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali ke Daftar Berita</span>
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
    <!-- Main Form Column (Left 2 cols) -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">
            <h2 class="text-xl font-heading font-bold text-brand mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit Berita & Artikel SEO
            </h2>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="newsForm" action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-sm">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-slate-700 mb-1.5 font-semibold">Judul Berita (SEO Title) *</label>
                    <input type="text" id="titleInput" name="title" value="{{ old('title', $news->title) }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500 font-medium">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-slate-700 mb-1.5 font-semibold">Kategori Publikasi *</label>
                        <select name="category" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
                            <option value="Informasi Berkala" {{ old('category', $news->category) == 'Informasi Berkala' ? 'selected' : '' }}>Informasi Berkala</option>
                            <option value="Informasi Serta Merta" {{ old('category', $news->category) == 'Informasi Serta Merta' ? 'selected' : '' }}>Informasi Serta Merta</option>
                            <option value="Informasi Setiap Saat" {{ old('category', $news->category) == 'Informasi Setiap Saat' ? 'selected' : '' }}>Informasi Setiap Saat</option>
                            <option value="Pengumuman Resmi" {{ old('category', $news->category) == 'Pengumuman Resmi' ? 'selected' : '' }}>Pengumuman Resmi</option>
                            <option value="Berita Utama" {{ old('category', $news->category) == 'Berita Utama' ? 'selected' : '' }}>Berita Utama</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-slate-700 mb-1.5 font-semibold">Tanggal Publikasi *</label>
                        <input type="date" name="published_at" value="{{ old('published_at', date('Y-m-d', strtotime($news->published_at))) }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-700 mb-1.5 font-semibold">Gambar Sampul Berita (SEO OpenGraph Image)</label>
                    @if($news->image_url)
                    <div class="mb-3 flex items-center gap-4 p-3 bg-slate-50 border border-slate-200 rounded-xl">
                        <img src="{{ asset('storage/' . $news->image_url) }}" alt="Gambar Sampul" class="w-20 h-16 object-cover rounded-lg">
                        <span class="text-xs text-slate-500 font-medium">Gambar Sampul Saat Ini</span>
                    </div>
                    @endif
                    <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-slate-600 focus:outline-none focus:border-teal-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
                    <p class="text-[11px] text-slate-400 mt-1">Biarkan kosong jika tidak ingin merubah gambar sampul.</p>
                </div>

                <div>
                    <label class="block text-slate-700 mb-1.5 font-semibold">Ringkasan / Meta Description SEO *</label>
                    <textarea id="summaryInput" name="summary" rows="2" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-800 focus:outline-none focus:border-teal-500">{{ old('summary', $news->summary) }}</textarea>
                </div>

                <div>
                    <label class="block text-slate-700 mb-1.5 font-semibold">Isi Lengkap Berita (WYSIWYG Rich Editor)</label>
                    <!-- Quill Editor Container -->
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                        <div id="quillEditor" class="min-h-[280px] text-slate-800">
                            {!! old('content', $news->content) !!}
                        </div>
                    </div>
                    <!-- Hidden Textarea to submit HTML to Laravel -->
                    <textarea name="content" id="hiddenContent" class="hidden"></textarea>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Simpan Perubahan Berita
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-5 py-2.5 rounded-xl font-semibold transition">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Sidebar SEO Live Preview (Right 1 col) -->
    <div class="space-y-6">
        <!-- Google Search Snippet Preview -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4 sticky top-[130px]">
            <h3 class="font-heading font-bold text-slate-800 text-sm flex items-center gap-2 border-b border-slate-100 pb-3">
                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.761H12.545z"/></svg>
                Live Preview Tampilan Google (SEO)
            </h3>

            <div class="bg-slate-50 border border-slate-200 p-4 rounded-xl space-y-1.5 font-sans">
                <div class="flex items-center gap-1.5 text-xs text-slate-600 truncate">
                    <span class="w-4 h-4 rounded-full bg-teal-600 text-white font-bold flex items-center justify-center text-[9px]">P</span>
                    <span class="text-slate-700 font-medium">ppid.bhaktihusada-wonosobo.co.id</span>
                    <span class="text-slate-400">&rsaquo; berita</span>
                </div>
                <h4 id="seoTitlePreview" class="text-blue-700 font-semibold text-base hover:underline cursor-pointer leading-snug line-clamp-2">
                    {{ $news->title }}
                </h4>
                <p id="seoDescPreview" class="text-xs text-slate-600 leading-relaxed line-clamp-3">
                    {{ $news->summary }}
                </p>
            </div>

            <div class="p-3 bg-teal-50 border border-teal-100 rounded-xl text-xs text-teal-800 space-y-1">
                <span class="font-bold block flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Tips Optimasi SEO:
                </span>
                <ul class="list-disc pl-4 space-y-0.5 text-[11px]">
                    <li>Gunakan kata kunci utama di awal judul.</li>
                    <li>Sertakan H2 & H3 pada isi artikel.</li>
                    <li>Isi ringkasan dengan deskripsi informatif.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Quill Rich Text Editor
    const quill = new Quill('#quillEditor', {
        theme: 'snow',
        placeholder: 'Tuliskan isi berita secara lengkap di sini. Anda bisa menggunakan Format Paragraf, Bold, Italic, List, dan Hyperlink...',
        modules: {
            toolbar: [
                [{ 'header': [2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['blockquote', 'code-block'],
                ['link'],
                [{ 'align': [] }],
                ['clean']
            ]
        }
    });

    // Form submit handler to copy Quill HTML into hidden textarea
    document.getElementById('newsForm').addEventListener('submit', function() {
        document.getElementById('hiddenContent').value = quill.root.innerHTML;
    });

    // SEO Live Preview Listener
    const titleInput = document.getElementById('titleInput');
    const summaryInput = document.getElementById('summaryInput');
    const seoTitlePreview = document.getElementById('seoTitlePreview');
    const seoDescPreview = document.getElementById('seoDescPreview');

    titleInput.addEventListener('input', function() {
        seoTitlePreview.innerText = this.value || 'Judul Berita Akan Tampil Di Sini';
    });

    summaryInput.addEventListener('input', function() {
        seoDescPreview.innerText = this.value || 'Ringkasan deskripsi artikel berita akan tampil di sini pada hasil pencarian mesin pencari Google...';
    });
</script>
@endsection
