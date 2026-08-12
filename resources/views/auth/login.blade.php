<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Layanan Informasi Publik PT Bhakti Husada Wonosobo</title>
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
        <div class="p-8 sm:p-12">
            <div class="flex justify-center mb-6">
                <img src="/assets/logo.png" alt="Logo PT Bhakti Husada" class="h-16 w-auto object-contain">
            </div>
            
            <div class="text-center mb-8">
                <h1 class="text-2xl font-heading font-bold text-brand mb-2">Admin Panel System</h1>
                <p class="text-sm text-slate-500">Layanan Informasi Publik PT Bhakti Husada Wonosobo</p>
            </div>

            @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 text-sm font-medium text-center">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-sm placeholder:text-slate-400"
                        placeholder="contoh@bhaktihusada.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="block text-sm font-semibold text-slate-700">Kata Sandi</label>
                        <a href="{{ route('password.request') }}" class="text-xs font-semibold text-teal-600 hover:text-teal-700 hover:underline">Lupa Kata Sandi?</a>
                    </div>
                    <div class="relative">
                        <input type="password" id="loginPassword" name="password" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-4 pr-12 py-3 text-slate-800 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition shadow-sm placeholder:text-slate-400"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePasswordVisibility('loginPassword', 'loginEyeClosed', 'loginEyeOpen')" aria-label="Tampilkan atau sembunyikan kata sandi" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 p-1 focus:outline-none transition">
                            <svg id="loginEyeClosed" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg id="loginEyeOpen" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.02 10.02 0 013.682-.813c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18"/></svg>
                        </button>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3.5 px-4 rounded-xl transition shadow-md hover:shadow-lg flex justify-center items-center gap-2">
                        Masuk Sistem
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </form>
            
            <div class="mt-8 text-center">
                <a href="/" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-brand transition group">
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-brand transition transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>Kembali ke Website Utama</span>
                </a>
            </div>
        </div>
        <div class="bg-slate-50/80 px-8 py-4 text-center border-t border-slate-100">
            <p class="text-xs text-slate-400">&copy; {{ date('Y') }} PT Bhakti Husada Wonosobo. Didukung oleh Diskominfo Wonosobo.</p>
        </div>
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
</body>
</html>
