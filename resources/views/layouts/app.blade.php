<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - PT Bhakti Husada Wonosobo')</title>
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
                            50: '#f0fdfa',
                            600: '#0d9488',
                            700: '#0f766e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen">
    <!-- Top Header -->
    <nav class="bg-white border-b border-slate-200 px-4 sm:px-6 py-3 flex flex-wrap sm:flex-nowrap justify-between items-center gap-3 sticky top-0 z-50 shadow-sm">
        <div class="flex items-center gap-3">
            <img src="/assets/logo.png" alt="Logo PT Bhakti Husada" class="w-9 h-9 sm:w-10 sm:h-10 object-contain">
            <div>
                <h1 class="font-heading font-bold text-brand leading-tight text-sm sm:text-base md:text-lg">PT Bhakti Husada Wonosobo</h1>
                <span class="text-[11px] sm:text-xs text-slate-500 block leading-tight">Dashboard Pengelolaan Informasi Publik</span>
            </div>
        </div>

        <div class="flex items-center gap-2 sm:gap-3 ml-auto sm:ml-0">
            @auth
            <div class="text-right mr-1 hidden lg:block">
                <div class="text-xs font-bold text-brand leading-none mb-0.5">{{ auth()->user()->name }}</div>
                <div class="text-[9px] uppercase tracking-widest font-semibold text-slate-400">{{ auth()->user()->role }}</div>
            </div>
            @if(auth()->user()->isSuperAdmin())
                <span class="text-[10px] sm:text-xs bg-purple-50 text-purple-700 border border-purple-200 px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full font-extrabold uppercase tracking-wider">Super Admin</span>
            @elseif(auth()->user()->isAdmin())
                <span class="text-[10px] sm:text-xs bg-rose-50 text-rose-600 border border-rose-100 px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full font-semibold uppercase tracking-wider">Admin</span>
            @elseif(auth()->user()->isOperator())
                <span class="text-[10px] sm:text-xs bg-teal-50 text-teal-600 border border-teal-100 px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full font-semibold uppercase tracking-wider">Operator</span>
            @else
                <span class="text-[10px] sm:text-xs bg-blue-50 text-blue-600 border border-blue-100 px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full font-semibold uppercase tracking-wider">Pimpinan</span>
            @endif
            @endauth
            
            <a href="{{ route('home') }}" class="text-xs font-bold bg-teal-50 text-teal-700 hover:bg-teal-600 hover:text-white border border-teal-200 px-2.5 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition shadow-sm flex items-center gap-1.5" target="_blank" title="Ke Website Utama">
                <span class="hidden sm:inline">Ke Website Utama</span>
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-xs font-bold bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-200 px-2.5 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition shadow-sm flex items-center gap-1.5" title="Logout">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span class="hidden sm:inline">Logout</span>
                </button>
            </form>
        </div>
    </nav>

    <!-- Sub Navigation Tabs (Mobile Scrollable Pill Nav) -->
    <nav class="bg-white border-b border-slate-200 px-4 sm:px-6 py-2 shadow-sm sticky top-[61px] z-40">
        <div class="max-w-7xl mx-auto overflow-x-auto no-scrollbar">
            <ul class="flex items-center gap-1.5 sm:gap-3 text-xs sm:text-sm font-semibold whitespace-nowrap min-w-max">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition inline-flex items-center gap-2 {{ request()->routeIs('admin.dashboard') ? 'bg-teal-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <span>Permohonan Informasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.dip-documents.index') }}" class="px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition inline-flex items-center gap-2 {{ request()->routeIs('admin.dip-documents.*') ? 'bg-teal-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <span>Dokumen DIP</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.regulations.index') }}" class="px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition inline-flex items-center gap-2 {{ request()->routeIs('admin.regulations.*') ? 'bg-teal-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <span>Regulasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}" class="px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition inline-flex items-center gap-2 {{ request()->routeIs('admin.news.*') ? 'bg-teal-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contact-messages.index') }}" class="px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition inline-flex items-center gap-2 {{ request()->routeIs('admin.contact-messages.*') ? 'bg-teal-600 text-white shadow-sm font-bold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <span>Kotak Masuk</span>
                    </a>
                </li>
                @if(auth()->check() && auth()->user()->isSuperAdmin())
                @php
                    $pendingResetCount = \App\Models\PasswordResetRequest::where('status', 'pending')->count();
                @endphp
                <li>
                    <a href="{{ route('admin.password-reset-requests.index') }}" class="px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition inline-flex items-center gap-1.5 {{ request()->routeIs('admin.password-reset-requests.*') ? 'bg-purple-700 text-white shadow-sm font-bold' : 'text-purple-700 bg-purple-50 hover:bg-purple-100' }}">
                        <span>Reset Password</span>
                        @if($pendingResetCount > 0)
                            <span class="bg-rose-500 text-white text-[10px] font-extrabold px-1.5 py-0.2 rounded-full">{{ $pendingResetCount }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="px-3 py-1.5 sm:px-3.5 sm:py-2 rounded-xl transition inline-flex items-center gap-2 {{ request()->routeIs('admin.users.*') ? 'bg-purple-700 text-white shadow-sm font-bold' : 'text-purple-700 bg-purple-50 hover:bg-purple-100' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Kelola Pengguna</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    <main class="p-4 sm:p-6 max-w-7xl mx-auto">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-teal-50 border border-teal-100 text-teal-700 text-sm flex items-center gap-2">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
