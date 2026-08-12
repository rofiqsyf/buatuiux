@extends('layouts.public')

@section('title', 'Formulir Permohonan Informasi Publik - E-PPID')

@section('content')
<!-- Header Banner -->
<section class="hero-gradient text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl text-white">Formulir Permohonan Informasi Online</h1>
        <p class="text-slate-200 text-xs sm:text-sm mt-2 max-w-2xl">
            Silakan lengkapi formulir di bawah ini dengan data diri yang sah untuk mengajukan permohonan informasi publik kepada PPID PT Bhakti Husada Wonosobo.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        
        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden p-8 sm:p-12">
            
            <div id="formAlert" class="hidden mb-6 p-4 rounded-xl text-sm font-medium"></div>

            <form id="permohonanForm" onsubmit="submitForm(event)" enctype="multipart/form-data" class="space-y-6" novalidate>
                @csrf

                <div class="border-b border-slate-200 pb-4">
                    <h2 class="font-heading font-bold text-slate-800 text-lg">1. Data Diri Pemohon Informasi</h2>
                    <p class="text-xs text-slate-500">Lengkapi data pemohon dengan informasi yang sah</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="form-group" id="group-nama">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Nama Lengkap *</label>
                        <input type="text" name="nama" id="input-nama" required placeholder="Nama lengkap Anda..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                        <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                    </div>

                    <div class="form-group" id="group-nik">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">NIK (16 Digit) *</label>
                        <input type="text" name="nik" id="input-nik" maxlength="16" minlength="16" required placeholder="3307xxxxxxxxxxxx" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm font-mono focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                        <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                    </div>

                    <div class="form-group" id="group-email">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Email *</label>
                        <input type="email" name="email" id="input-email" required placeholder="email@domain.com" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                        <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                    </div>

                    <div class="form-group" id="group-telepon">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">No. Telepon / WhatsApp *</label>
                        <input type="tel" name="telepon" id="input-telepon" required placeholder="08xxxxxxxxxx" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition">
                        <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                    </div>
                </div>

                <div class="form-group" id="group-alamat">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Domisili Lengkap *</label>
                    <textarea name="alamat" id="input-alamat" rows="2" required placeholder="Alamat domisili lengkap Anda saat ini..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition"></textarea>
                    <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                </div>

                <div class="border-b border-slate-200 pb-4 pt-4">
                    <h2 class="font-heading font-bold text-slate-800 text-lg">2. Rincian Informasi & Lampiran Document</h2>
                    <p class="text-xs text-slate-500">Jelaskan spesifikasi informasi dan sertakan dokumen pendukung jika ada</p>
                </div>

                <div class="form-group" id="group-rincian">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Rincian Informasi yang Dibutuhkan *</label>
                    <textarea name="rincian" id="input-rincian" rows="4" required placeholder="Uraikan secara jelas dan detail informasi atau dokumen publik apa yang Anda minta..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition"></textarea>
                    <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                </div>

                <div class="form-group" id="group-tujuan">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Tujuan Penggunaan Informasi *</label>
                    <textarea name="tujuan" id="input-tujuan" rows="2" required placeholder="Sebutkan peruntukan penggunaan informasi tersebut (misal: Penelitian Akademis, Transparansi Publik, dll)..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition"></textarea>
                    <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                </div>

                <div class="form-group" id="group-fileLampiran">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Lampiran Surat / Dokumen Pendukung (Max 5MB)</label>
                    <input type="file" name="fileLampiran" id="input-fileLampiran" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition">
                    <p class="text-[11px] text-slate-400 mt-1">Format yang diperbolehkan: PDF, DOC, DOCX, JPG, atau PNG.</p>
                    <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                </div>

                <div class="form-group pt-4 border-t border-slate-200" id="group-pernyataan">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" name="pernyataan" id="input-pernyataan" value="1" required class="mt-1 w-4 h-4 text-teal-600 rounded focus:ring-teal-500 border-slate-300">
                        <span class="text-xs text-slate-600 leading-relaxed">
                            Saya menyatakan bahwa seluruh data yang diisi pada formulir ini adalah benar, sah, dan informasi yang diperoleh akan digunakan sesuai peraturan perundang-undangan.
                        </span>
                    </label>
                    <p class="error-msg text-xs text-rose-600 font-semibold mt-1 hidden"></p>
                </div>

                <button type="submit" id="submitBtn" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-extrabold py-4 rounded-xl text-sm transition shadow-lg hover:shadow-teal-500/20 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Kirim Permohonan Informasi
                </button>
            </form>

        </div>

    </div>
</section>

<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl text-center space-y-5 animate-in fade-in zoom-in duration-200">
        <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h3 class="font-heading font-extrabold text-slate-800 text-2xl">Permohonan Terkirim!</h3>
        <p class="text-xs text-slate-600">Terima kasih. Permohonan informasi Anda telah dicatat dalam sistem PT Bhakti Husada Wonosobo.</p>
        
        <div class="bg-slate-50 border border-slate-200 p-4 rounded-2xl space-y-1">
            <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest block">Nomor Tiket Anda</span>
            <div id="generatedTicket" class="font-mono font-extrabold text-xl text-teal-600 select-all">REQ-2026...</div>
            <p class="text-[10px] text-slate-400 pt-1">Simpan nomor tiket ini untuk melacak perkembangan permohonan Anda.</p>
        </div>

        <div class="flex flex-col gap-2 pt-2">
            <button onclick="copyTicket()" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-3 rounded-xl text-xs transition">
                Salin Nomor Tiket
            </button>
            <a href="{{ route('home') }}" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-xl text-xs transition">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
    // Reset red border styling on input/change
    document.querySelectorAll('#permohonanForm input, #permohonanForm textarea').forEach(el => {
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
            const input = group.querySelector('input, textarea');
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

    async function submitForm(e) {
        e.preventDefault();
        clearAllErrors();

        const form = document.getElementById('permohonanForm');
        const btn = document.getElementById('submitBtn');
        const alert = document.getElementById('formAlert');

        // Client-side instant validation check
        let hasError = false;
        let firstInvalidField = null;

        const nama = document.getElementById('input-nama');
        const nik = document.getElementById('input-nik');
        const email = document.getElementById('input-email');
        const telepon = document.getElementById('input-telepon');
        const alamat = document.getElementById('input-alamat');
        const rincian = document.getElementById('input-rincian');
        const tujuan = document.getElementById('input-tujuan');
        const pernyataan = document.getElementById('input-pernyataan');

        if (!nama.value.trim()) {
            highlightFieldError('nama', 'Nama lengkap wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = nama;
        }

        if (!nik.value.trim() || nik.value.trim().length !== 16) {
            highlightFieldError('nik', 'NIK wajib diisi persis 16 digit angka.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = nik;
        }

        if (!email.value.trim() || !email.value.includes('@')) {
            highlightFieldError('email', 'Alamat email wajib diisi dengan format valid.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = email;
        }

        if (!telepon.value.trim() || telepon.value.trim().length < 9) {
            highlightFieldError('telepon', 'Nomor telepon / WhatsApp wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = telepon;
        }

        if (!alamat.value.trim()) {
            highlightFieldError('alamat', 'Alamat domisili lengkap wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = alamat;
        }

        if (!rincian.value.trim()) {
            highlightFieldError('rincian', 'Rincian informasi yang dibutuhkan wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = rincian;
        }

        if (!tujuan.value.trim()) {
            highlightFieldError('tujuan', 'Tujuan penggunaan informasi wajib diisi.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = tujuan;
        }

        if (!pernyataan.checked) {
            highlightFieldError('pernyataan', 'Anda harus menyetujui pernyataan keabsahan data.');
            hasError = true;
            if (!firstInvalidField) firstInvalidField = pernyataan;
        }

        if (hasError) {
            alert.className = "mb-6 p-4 rounded-xl text-sm font-medium bg-rose-50 border border-rose-200 text-rose-700 flex items-center gap-2";
            alert.innerHTML = '<svg class="w-4 h-4 shrink-0 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg><span>Pengisian formulir belum lengkap atau terdapat isian yang belum sesuai. Silakan periksa kolom berpenerang merah.</span>';
            alert.classList.remove('hidden');

            if (firstInvalidField) {
                firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalidField.focus();
            }
            return;
        }
        
        btn.disabled = true;
        btn.innerHTML = "Mengirim Permohonan...";
        alert.classList.add('hidden');

        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route("request.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                document.getElementById('generatedTicket').innerText = data.ticket_number;
                document.getElementById('successModal').classList.remove('hidden');
                document.getElementById('successModal').classList.add('flex');
                form.reset();
                clearAllErrors();
            } else {
                alert.className = "mb-6 p-4 rounded-xl text-sm font-medium bg-rose-50 border border-rose-200 text-rose-700";
                alert.innerText = data.message || "Terjadi kesalahan saat menyimpan data.";
                alert.classList.remove('hidden');

                if (data.errors) {
                    Object.keys(data.errors).forEach(key => {
                        highlightFieldError(key, data.errors[key][0]);
                    });
                }
            }
        } catch (err) {
            alert.className = "mb-6 p-4 rounded-xl text-sm font-medium bg-rose-50 border border-rose-200 text-rose-700";
            alert.innerText = "Terjadi kesalahan koneksi jaringan.";
            alert.classList.remove('hidden');
        } finally {
            btn.disabled = false;
            btn.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                Kirim Permohonan Informasi
            `;
        }
    }

    function copyTicket() {
        const t = document.getElementById('generatedTicket').innerText;
        navigator.clipboard.writeText(t);
        alert('Nomor tiket berhasil disalin!');
    }
</script>
@endsection
