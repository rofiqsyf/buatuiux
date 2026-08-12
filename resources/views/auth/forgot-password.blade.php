<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - PT Bhakti Husada Wonosobo</title>
    <link rel="icon" href="/assets/logo.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            DEFAULT: '#0f2b3c',
                            light: '#1a3f56',
                        },
                        teal: {
                            600: '#0d9488',
                            700: '#0f766e',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 font-sans min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
        <div class="p-8 sm:p-10">
            <div class="flex justify-center mb-6">
                <img src="/assets/logo.png" alt="Logo PT Bhakti Husada" class="h-14 w-auto object-contain">
            </div>
            
            <div class="text-center mb-6">
                <h1 class="text-2xl font-heading font-bold text-brand mb-1.5">Permohonan Reset Kata Sandi</h1>
                <p class="text-xs text-slate-500 leading-relaxed">Kirimkan permohonan reset kata sandi kepada Super Admin Diskominfo untuk diverifikasi.</p>
            </div>

            @if(session('status'))
                <div class="mb-6 p-4 rounded-2xl bg-teal-50 border border-teal-200 text-teal-800 text-xs font-semibold leading-relaxed space-y-2">
                    <div class="flex items-center gap-2 font-bold text-teal-900 text-sm">
                        <svg class="w-5 h-5 text-teal-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Permohonan Terkirim</span>
                    </div>
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            @if(session('info'))
                <div class="mb-6 p-4 rounded-2xl bg-sky-50 border border-sky-200 text-sky-800 text-xs font-semibold leading-relaxed">
                    {{ session('info') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 text-xs font-medium space-y-1">
                    @foreach($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" class="space-y-4 text-xs">
                @csrf
                <div>
                    <label class="block font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Email Terdaftar *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-sm placeholder:text-slate-400"
                        placeholder="admin@bhaktihusada-wonosobo.co.id">
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Alasan Permohonan Reset *</label>
                    <textarea name="reason" rows="3" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-sm placeholder:text-slate-400"
                        placeholder="Contoh: Lupa password lama / perangkat baru / pergantian kendali petugas..."></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3.5 px-4 rounded-xl transition shadow-md hover:shadow-lg flex justify-center items-center gap-2 text-sm">
                        <span>Kirim Ke Super Admin</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center pt-4 border-t border-slate-100 flex justify-between items-center text-xs font-semibold">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-slate-600 hover:text-teal-600 transition group">
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-teal-600 transition transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>Kembali ke Login</span>
                </a>
                <a href="/" class="inline-flex items-center gap-1.5 text-slate-500 hover:text-brand transition group">
                    <span>Beranda Utama</span>
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-brand transition transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
        <div class="bg-slate-50/80 px-8 py-3.5 text-center border-t border-slate-100">
            <p class="text-[11px] text-slate-400">&copy; {{ date('Y') }} PT Bhakti Husada Wonosobo (Perseroda)</p>
        </div>
    </div>
</body>
</html>
