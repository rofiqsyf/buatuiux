@extends('layouts.public')

@section('title', 'Kontak Sekretariat PPID - PT Bhakti Husada Wonosobo')

@section('content')
<section class="hero-gradient text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl text-white">Hubungi Sekretariat PPID</h1>
        <p class="text-slate-200 text-xs sm:text-sm mt-2 max-w-2xl">
            Layanan pengaduan, konsultasi, dan pertanyaan mengenai Keterbukaan Informasi Publik di PT Bhakti Husada Wonosobo (Perseroda).
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Left: Contact Form -->
            <div class="lg:col-span-7 bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div>
                    <h2 class="font-heading font-bold text-slate-800 text-xl">Kirim Pesan / Pertanyaan</h2>
                    <p class="text-xs text-slate-500 mt-1">Tim petugas PPID akan memberikan tanggapan resmi ke email Anda.</p>
                </div>

                <div id="contactAlert" class="hidden p-4 rounded-xl text-sm font-medium"></div>

                <form id="contactForm" onsubmit="submitContact(event)" enctype="multipart/form-data" class="space-y-4" novalidate>
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="form-group" id="group-nama">
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Nama Lengkap *</label>
                            <input type="text" name="nama" id="input-nama" required placeholder="Nama Anda" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                            <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                        </div>

                        <div class="form-group" id="group-telepon">
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">No. Telepon / WA *</label>
                            <input type="tel" name="telepon" id="input-telepon" required placeholder="08xxxxxxxxxx" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                            <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="form-group" id="group-email">
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Alamat Email *</label>
                            <input type="email" name="email" id="input-email" required placeholder="email@domain.com" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                            <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                        </div>

                        <div class="form-group" id="group-subjek">
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Kategori Pertanyaan *</label>
                            <select name="subjek" id="input-subjek" required class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition text-slate-700">
                                <option value="Informasi Umum">Informasi Umum</option>
                                <option value="Prosedur PPID">Prosedur Layanan PPID</option>
                                <option value="Konsultasi Dokumen">Konsultasi Dokumen DIP</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                        </div>
                    </div>

                    <div class="form-group" id="group-judul">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Judul Pesan *</label>
                        <input type="text" name="judul" id="input-judul" required placeholder="Subjek atau ringkasan pertanyaan..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                        <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                    </div>

                    <div class="form-group" id="group-pesan">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Pesan Lengkap *</label>
                        <textarea name="pesan" id="input-pesan" rows="4" required placeholder="Tuliskan pertanyaan atau pengaduan secara lengkap..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition"></textarea>
                        <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                    </div>

                    <!-- Form Upload File Lampiran (Persis seperti di Formulir Permohonan) -->
                    <div class="form-group" id="group-kontakFile">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Unggah Lampiran Surat / Dokumen Pendukung (Max 5MB)</label>
                        <input type="file" name="kontakFile" id="input-kontakFile" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition">
                        <p class="text-[11px] text-slate-400 mt-1">Format yang diperbolehkan: PDF, DOC, DOCX, JPG, atau PNG.</p>
                        <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                    </div>

                    <button type="submit" id="contactBtn" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3.5 rounded-xl text-sm transition shadow-md flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Kirim Pesan Sekarang
                    </button>
                </form>
            </div>

            <!-- Right: Office Info & Google Maps Embed -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-4">
                    <h3 class="font-heading font-bold text-slate-800 text-lg border-b border-slate-100 pb-2">Sekretariat Layanan</h3>
                    <div class="space-y-3 text-xs text-slate-600">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-teal-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <div>
                                <strong class="text-slate-800">Alamat Kantor Resmi:</strong><br>
                                <strong>PT Bhakti Husada Wonosobo (Perseroda)</strong><br>
                                Jl. Kolonel Kardjono No. 16, Ngedok, Wonosobo Barat, Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311<br>
                                <span class="text-[11px] text-teal-600 font-semibold">(Plus Code: JVPX+G7 Wonosobo Bar.)</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-teal-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1.001 1.001 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <div>
                                <strong class="text-slate-800">Telepon / Fax Resmi:</strong><br>
                                (0286) 321134
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-teal-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <div>
                                <strong class="text-slate-800">Email Resmi:</strong><br>
                                info@bhaktihusada-wonosobo.co.id
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-teal-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <strong class="text-slate-800">Jam Operasional Layanan:</strong><br>
                                Senin - Jumat (08.00 - 15.00 WIB)
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Interactive Google Maps Frame & Direct Button -->
                <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-full h-56 rounded-2xl overflow-hidden border border-slate-200 relative">
                        <iframe
                            src="https://maps.google.com/maps?q=Jl.+Kolonel+Kardjono+No.16,+Ngedok,+Wonosobo+Barat,+Kabupaten+Wonosobo,+Jawa+Tengah+56311&t=m&z=17&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <a href="https://maps.app.goo.gl/jX6LCEHm7Me3F5Hw9" target="_blank" rel="noopener noreferrer" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold py-2.5 rounded-xl transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Buka Lokasi (JVPX+G7) di Google Maps</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    // Reset red border styling on input/change
    document.querySelectorAll('#contactForm input, #contactForm select, #contactForm textarea').forEach(el => {
        el.addEventListener('input', () => clearFieldError(el));
        el.addEventListener('change', () => clearFieldError(el));
    });

    function clearFieldError(el) {
        const group = el.closest('.form-group');
        if (!group) return;

        el.classList.remove('border-rose-500', 'bg-rose-50/40', 'ring-2', 'ring-rose-500/20');
        el.classList.add('border-slate-300', 'bg-slate-50');

        const errorP = group.querySelector('.error-msg');
        if (errorP) {
            errorP.classList.add('hidden');
            errorP.innerText = '';
        }
    }

    function highlightFieldError(fieldId, message) {
        const input = document.getElementById('input-' + fieldId) || document.querySelector(`[name="${fieldId}"]`);
        const group = document.getElementById('group-' + fieldId) || (input ? input.closest('.form-group') : null);

        if (input) {
            input.classList.remove('border-slate-300', 'bg-slate-50');
            input.classList.add('border-rose-500', 'bg-rose-50/40', 'ring-2', 'ring-rose-500/20');
        }

        if (group) {
            const errorP = group.querySelector('.error-msg');
            if (errorP) {
                errorP.innerText = message;
                errorP.classList.remove('hidden');
            }
        }
    }

    function clearAllErrors() {
        document.querySelectorAll('.form-group').forEach(group => {
            const input = group.querySelector('input, select, textarea');
            if (input) {
                input.classList.remove('border-rose-500', 'bg-rose-50/40', 'ring-2', 'ring-rose-500/20');
                input.classList.add('border-slate-300', 'bg-slate-50');
            }
            const errorP = group.querySelector('.error-msg');
            if (errorP) {
                errorP.classList.add('hidden');
                errorP.innerText = '';
            }
        });
    }

    async function submitContact(e) {
        e.preventDefault();
        clearAllErrors();

        const form = document.getElementById('contactForm');
        const btn = document.getElementById('contactBtn');
        const alert = document.getElementById('contactAlert');

        let hasError = false;
        let firstInvalidField = null;

        const nama = document.getElementById('input-nama');
        const telepon = document.getElementById('input-telepon');
        const email = document.getElementById('input-email');
        const judul = document.getElementById('input-judul');
        const pesan = document.getElementById('input-pesan');

        if (!nama.value.trim()) {
            highlightFieldError('nama', 'Nama lengkap wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = nama;
        }

        if (!telepon.value.trim() || telepon.value.trim().length < 9) {
            highlightFieldError('telepon', 'Nomor telepon / WhatsApp wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = telepon;
        }

        if (!email.value.trim() || !email.value.includes('@')) {
            highlightFieldError('email', 'Alamat email wajib diisi dengan format valid.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = email;
        }

        if (!judul.value.trim()) {
            highlightFieldError('judul', 'Judul pesan wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = judul;
        }

        if (!pesan.value.trim()) {
            highlightFieldError('pesan', 'Pesan lengkap wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = pesan;
        }

        if (hasError) {
            alert.className = "p-4 rounded-xl text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-700 flex items-center gap-2";
            alert.innerHTML = '<svg class="w-4 h-4 shrink-0 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg><span>Pengisian formulir belum lengkap. Silakan periksa kolom berpenerang merah.</span>';
            alert.classList.remove('hidden');

            if (firstInvalidField) {
                firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalidField.focus();
            }
            return;
        }

        btn.disabled = true;
        btn.innerHTML = "Mengirim Pesan...";
        alert.classList.add('hidden');

        try {
            const formData = new FormData(form);
            const response = await fetch('{{ route("contact.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                alert.className = "p-4 rounded-xl text-xs font-semibold bg-teal-50 border border-teal-200 text-teal-700";
                alert.innerText = data.message;
                alert.classList.remove('hidden');
                form.reset();
                clearAllErrors();
            } else {
                alert.className = "p-4 rounded-xl text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-700";
                alert.innerText = data.message || "Gagal mengirim pesan.";
                alert.classList.remove('hidden');
            }
        } catch (err) {
            alert.className = "p-4 rounded-xl text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-700";
            alert.innerText = "Terjadi kesalahan koneksi jaringan.";
            alert.classList.remove('hidden');
        } finally {
            btn.disabled = false;
            btn.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                Kirim Pesan Sekarang
            `;
        }
    }
</script>
@endsection
