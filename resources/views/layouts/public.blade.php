<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Layanan Informasi Publik PT Bhakti Husada Wonosobo (Perseroda)')</title>
    <meta name="description" content="@yield('meta_description', 'Portal Resmi Layanan Informasi Publik PT Bhakti Husada Wonosobo (Perseroda). Akses permohonan informasi, regulasi, dan transparansi BUMD secara akuntabel.')">
    @yield('seo_meta')
    <link rel="icon" href="/assets/logo.png" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
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
                            50: '#f0f7ff',
                            100: '#e0effe',
                            600: '#0284c7',
                            800: '#075985',
                            900: '#0f2b3c',
                            dark: '#0a1d29',
                        },
                        teal: {
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #0f2b3c 0%, #075985 50%, #0d9488 100%);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen">



    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo & Brand Name -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                    <img src="/assets/logo.png" alt="Logo PT Bhakti Husada" class="w-11 h-11 object-contain transition group-hover:scale-105">
                    <div>
                        <span class="block font-heading font-extrabold text-brand-900 text-base sm:text-lg leading-snug group-hover:text-teal-600 transition">
                            PT Bhakti Husada Wonosobo
                        </span>
                        <span class="block text-xs font-semibold text-slate-500 tracking-wider">
                            Layanan Informasi Publik
                        </span>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-700">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-teal-600 font-bold border-b-2 border-teal-600 py-1' : 'hover:text-brand-900 transition' }}">Beranda</a>

                    <!-- Dropdown Profil -->
                    <div class="relative group py-5">
                        <a href="{{ route('profil') }}" class="inline-flex items-center gap-1 {{ request()->routeIs('profil*') ? 'text-teal-600 font-bold border-b-2 border-teal-600 py-1' : 'hover:text-brand-900 transition' }}">
                            <span>Profil</span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-brand-900 group-hover:rotate-180 transition transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                        <div class="absolute left-0 top-full hidden group-hover:block w-60 bg-white rounded-2xl shadow-xl border border-slate-100 py-2.5 z-50 animate-in fade-in slide-in-from-top-2 duration-150">
                            <a href="{{ route('profil') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Profil Perusahaan</a>
                            <a href="{{ route('profil.visi-misi') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Visi & Misi Pelayanan</a>
                            <a href="{{ route('profil.tugas-fungsi') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Tugas & Fungsi Operasional</a>
                            <a href="{{ route('profil.struktur-organisasi') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Struktur Perusahaan</a>
                            <a href="{{ route('profil.maklumat-pelayanan') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Maklumat Pelayanan</a>
                        </div>
                    </div>

                    <a href="{{ route('layanan.index') }}" class="{{ request()->routeIs('layanan.*') ? 'text-teal-600 font-bold border-b-2 border-teal-600 py-1' : 'hover:text-brand-900 transition' }}">Layanan</a>

                    <!-- Dropdown Informasi Publik -->
                    <div class="relative group py-5">
                        <a href="{{ route('dip.index') }}" class="inline-flex items-center gap-1 {{ request()->routeIs('dip.*') || request()->routeIs('prosedur.*') || request()->routeIs('news.*') ? 'text-teal-600 font-bold border-b-2 border-teal-600 py-1' : 'hover:text-brand-900 transition' }}">
                            <span>Informasi Publik</span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-brand-900 group-hover:rotate-180 transition transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                        <div class="absolute left-0 top-full hidden group-hover:block w-60 bg-white rounded-2xl shadow-xl border border-slate-100 py-2.5 z-50 animate-in fade-in slide-in-from-top-2 duration-150">
                            <a href="{{ route('dip.index') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Daftar Informasi Publik (DIP)</a>
                            <a href="{{ route('prosedur.public') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Alur & Prosedur Layanan</a>
                            <a href="{{ route('news.public') }}" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-teal-50 hover:text-teal-600 transition">Berita & Publikasi Kegiatan</a>
                        </div>
                    </div>

                    <a href="{{ route('regulations.public') }}" class="{{ request()->routeIs('regulations.*') ? 'text-teal-600 font-bold border-b-2 border-teal-600 py-1' : 'hover:text-brand-900 transition' }}">Regulasi</a>
                    <a href="{{ route('contact.index') }}" class="{{ request()->routeIs('contact.*') ? 'text-teal-600 font-bold border-b-2 border-teal-600 py-1' : 'hover:text-brand-900 transition' }}">Kontak</a>
                </nav>

                <!-- Header Actions (Single Point of Action) -->
                <div class="hidden sm:flex items-center gap-3">
                    <button onclick="openTrackingModal()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold px-3.5 py-2.5 rounded-xl transition flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Lacak Tiket
                    </button>
                    <a href="{{ route('request.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Permohonan Informasi
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" onclick="toggleMobileMenu()" aria-label="Toggle Navigation Menu" class="lg:hidden p-2.5 rounded-xl text-slate-700 hover:text-teal-600 hover:bg-teal-50 border border-slate-200 transition focus:outline-none flex items-center justify-center">
                    <svg id="mobileMenuIconClosed" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="mobileMenuIconOpen" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Drawer (Glassmorphism & Collapsible Groups) -->
        <div id="mobileMenu" class="hidden lg:hidden border-t border-slate-200/90 bg-white/95 backdrop-blur-xl px-4 pt-4 pb-7 space-y-2 shadow-2xl animate-in slide-in-from-top-3 duration-200">
            
            <!-- 1. Beranda -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'bg-teal-50 text-teal-700 font-bold border border-teal-100' : 'text-slate-700 hover:bg-slate-100' }}">
                <svg class="w-4 h-4 text-teal-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Beranda</span>
            </a>

            <!-- 2. Accordion Profil Perusahaan -->
            <div class="rounded-xl border border-slate-100 overflow-hidden">
                <button type="button" onclick="toggleMobileSubmenu('mobProfil')" class="w-full flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold {{ request()->routeIs('profil*') ? 'bg-teal-50 text-teal-700 font-bold' : 'text-slate-700 hover:bg-slate-100' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-teal-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>Profil Perusahaan</span>
                    </div>
                    <svg id="mobProfilArrow" class="w-4 h-4 text-slate-400 transition transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="mobProfil" class="hidden bg-slate-50/80 px-3.5 py-2 space-y-1 border-t border-slate-100 text-xs">
                    <a href="{{ route('profil') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('profil') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Tentang Perusahaan</a>
                    <a href="{{ route('profil.visi-misi') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('profil.visi-misi') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Visi & Misi Pelayanan</a>
                    <a href="{{ route('profil.tugas-fungsi') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('profil.tugas-fungsi') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Tugas & Fungsi Operasional</a>
                    <a href="{{ route('profil.struktur-organisasi') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('profil.struktur-organisasi') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Struktur Perusahaan</a>
                    <a href="{{ route('profil.maklumat-pelayanan') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('profil.maklumat-pelayanan') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Maklumat Pelayanan</a>
                </div>
            </div>

            <!-- 3. Portal Layanan Digital Hub -->
            <a href="{{ route('layanan.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('layanan.*') ? 'bg-teal-50 text-teal-700 font-bold border border-teal-100' : 'text-slate-700 hover:bg-slate-100' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-teal-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>Portal Layanan Digital</span>
                </div>
                <span class="bg-teal-100 text-teal-800 text-[10px] font-extrabold px-2 py-0.5 rounded-full uppercase">Digital Hub</span>
            </a>

            <!-- 4. Accordion Informasi Publik -->
            <div class="rounded-xl border border-slate-100 overflow-hidden">
                <button type="button" onclick="toggleMobileSubmenu('mobInfo')" class="w-full flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold {{ request()->routeIs('dip.*') || request()->routeIs('prosedur.*') || request()->routeIs('news.*') ? 'bg-teal-50 text-teal-700 font-bold' : 'text-slate-700 hover:bg-slate-100' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-teal-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Informasi Publik</span>
                    </div>
                    <svg id="mobInfoArrow" class="w-4 h-4 text-slate-400 transition transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="mobInfo" class="hidden bg-slate-50/80 px-3.5 py-2 space-y-1 border-t border-slate-100 text-xs">
                    <a href="{{ route('dip.index') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('dip.*') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Daftar Informasi Publik (DIP)</a>
                    <a href="{{ route('prosedur.public') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('prosedur.*') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Alur & Prosedur Layanan (SOP)</a>
                    <a href="{{ route('news.public') }}" class="block px-3 py-1.5 rounded-lg {{ request()->routeIs('news.*') ? 'text-teal-700 font-bold bg-white' : 'text-slate-600 hover:text-teal-600' }}">&bull; Berita & Publikasi Kegiatan</a>
                </div>
            </div>

            <!-- 5. Regulasi -->
            <a href="{{ route('regulations.public') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('regulations.*') ? 'bg-teal-50 text-teal-700 font-bold border border-teal-100' : 'text-slate-700 hover:bg-slate-100' }}">
                <svg class="w-4 h-4 text-teal-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span>Regulasi KIP</span>
            </a>

            <!-- 6. Kontak -->
            <a href="{{ route('contact.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('contact.*') ? 'bg-teal-50 text-teal-700 font-bold border border-teal-100' : 'text-slate-700 hover:bg-slate-100' }}">
                <svg class="w-4 h-4 text-teal-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                <span>Hubungi Kami</span>
            </a>

            <!-- Action CTAs Drawer Footer -->
            <div class="pt-3 border-t border-slate-200/80 flex flex-col gap-2.5">
                <button onclick="toggleMobileMenu(); openTrackingModal();" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-800 font-semibold py-2.5 rounded-xl text-center text-xs flex items-center justify-center gap-2 border border-slate-200/80 transition">
                    <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span>Lacak Status Tiket Permohonan</span>
                </button>
                <a href="{{ route('request.create') }}" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-xl text-center text-xs transition shadow-md flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Formulir Permohonan Online</span>
                </a>
            </div>

        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-900 text-white border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

                <!-- Col 1: About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <img src="/assets/logo.png" alt="Logo PT Bhakti Husada" class="w-10 h-10 object-contain bg-white rounded-lg p-1">
                        <div>
                            <h3 class="font-heading font-bold text-white text-base">PT Bhakti Husada</h3>
                            <p class="text-xs text-slate-400">Kabupaten Wonosobo (Perseroda)</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed mb-4">
                        Layanan Informasi Publik PT Bhakti Husada Wonosobo bertugas memberikan pelayanan informasi publik yang transparan, akuntabel, dan efisien.
                    </p>
                </div>

                <!-- Col 2: Realtime Visitor Statistics -->
                <div>
                    <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-4 border-b border-slate-700 pb-2">Statistik Pengunjung</h4>
                    <div class="space-y-2 text-xs text-slate-300">
                        <div class="flex items-center justify-between bg-slate-800/80 px-3 py-2 rounded-lg border border-slate-700/60">
                            <span class="flex items-center gap-1.5 text-emerald-400 font-medium">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                Pengunjung Online:
                            </span>
                            <span id="statVisitorOnline" class="font-bold text-emerald-400 font-mono">{{ number_format($visitorStats['online'] ?? 1) }}</span>
                        </div>
                        <div class="flex items-center justify-between bg-slate-800/40 px-3 py-1.5 rounded-lg border border-slate-700/30">
                            <span>Hari Ini:</span>
                            <span id="statVisitorToday" class="font-semibold text-white font-mono">{{ number_format($visitorStats['today'] ?? 1) }}</span>
                        </div>
                        <div class="flex items-center justify-between bg-slate-800/40 px-3 py-1.5 rounded-lg border border-slate-700/30">
                            <span>Bulan Ini:</span>
                            <span id="statVisitorMonth" class="font-semibold text-white font-mono">{{ number_format($visitorStats['month'] ?? 1) }}</span>
                        </div>
                        <div class="flex items-center justify-between bg-slate-800/40 px-3 py-1.5 rounded-lg border border-slate-700/30">
                            <span>Total Pengunjung:</span>
                            <span id="statVisitorTotal" class="font-semibold text-teal-400 font-mono">{{ number_format($visitorStats['total'] ?? 1) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Col 3: Govt & Health Agency Links -->
                <div>
                    <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-4 border-b border-slate-700 pb-2">Tautan Instansi</h4>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li><a href="https://wonosobokab.go.id" target="_blank" rel="noopener noreferrer" class="hover:text-teal-400 transition">Portal Pemkab Wonosobo</a></li>
                        <li><a href="https://rsud.wonosobokab.go.id" target="_blank" rel="noopener noreferrer" class="hover:text-teal-400 transition">RSUD KRT Setjonegoro Wonosobo</a></li>
                        <li><a href="https://dinkes.wonosobokab.go.id" target="_blank" rel="noopener noreferrer" class="hover:text-teal-400 transition">Dinas Kesehatan Kab. Wonosobo</a></li>
                        <li><a href="https://dinkes.jatengprov.go.id" target="_blank" rel="noopener noreferrer" class="hover:text-teal-400 transition">Dinas Kesehatan Prov. Jawa Tengah</a></li>
                        <li><a href="https://kemkes.go.id" target="_blank" rel="noopener noreferrer" class="hover:text-teal-400 transition">Kementerian Kesehatan RI</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact Info & Google Maps Embed -->
                <div class="space-y-3">
                    <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider border-b border-slate-700 pb-2">Sekretariat Layanan</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        <strong>PT Bhakti Husada Wonosobo (Perseroda)</strong><br>
                        Jl. Kolonel Kardjono No. 16, Ngedok, Wonosobo Barat, Kab. Wonosobo, Jawa Tengah 56311
                    </p>
                    <div class="text-xs text-slate-300 space-y-1">
                        <p><strong class="text-white">Email:</strong> info@bhaktihusada-wonosobo.co.id</p>
                        <p><strong class="text-white">Telepon:</strong> (0286) 321134</p>
                        <p><strong class="text-white">Jam Layanan:</strong> Senin - Jumat (08.00 - 15.00 WIB)</p>
                    </div>

                    <!-- Google Maps iFrame & Direct Link -->
                    <div class="pt-2 space-y-1.5">
                        <div class="w-full h-36 rounded-xl overflow-hidden border border-slate-700 shadow-md">
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
                        <a href="https://maps.app.goo.gl/jX6LCEHm7Me3F5Hw9" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-[11px] text-teal-400 hover:text-teal-300 font-semibold transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            <span>Buka di Google Maps (JVPX+G7)</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-12 pt-8 text-center text-xs text-slate-400">
                <p>&copy; {{ date('Y') }} PT Bhakti Husada Wonosobo (Perseroda). All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Tracking Modal -->
    <div id="trackingModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl relative border border-slate-100 animate-in fade-in zoom-in duration-200">
            <button onclick="closeTrackingModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-slate-800 text-lg">Lacak Status Permohonan</h3>
                    <p class="text-xs text-slate-500">Masukkan nomor tiket permohonan informasi Anda</p>
                </div>
            </div>

            <form id="trackingForm" onsubmit="submitTracking(event)" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Tiket (Contoh: REQ-2026...)</label>
                    <input type="text" id="modalTicketInput" name="ticket" required placeholder="Masukkan nomor tiket..." class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 font-mono">
                </div>
                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-xl text-sm transition shadow-md">
                    Cek Status Sekarang
                </button>
            </form>

            <div id="trackingResult" class="mt-4 hidden p-4 rounded-xl border text-sm">
                <!-- Ajax result inserted here -->
            </div>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const iconClosed = document.getElementById('mobileMenuIconClosed');
            const iconOpen = document.getElementById('mobileMenuIconOpen');
            
            const isHidden = menu.classList.contains('hidden');
            if (isHidden) {
                menu.classList.remove('hidden');
                if (iconClosed) iconClosed.classList.add('hidden');
                if (iconOpen) iconOpen.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                if (iconClosed) iconClosed.classList.remove('hidden');
                if (iconOpen) iconOpen.classList.add('hidden');
            }
        }

        function toggleMobileSubmenu(id) {
            const el = document.getElementById(id);
            const arrow = document.getElementById(id + 'Arrow');
            if (el) {
                el.classList.toggle('hidden');
                if (arrow) {
                    arrow.classList.toggle('rotate-180');
                }
            }
        }

        function openTrackingModal(ticketNum = '') {
            document.getElementById('trackingModal').classList.remove('hidden');
            document.getElementById('trackingModal').classList.add('flex');
            if (ticketNum) {
                document.getElementById('modalTicketInput').value = ticketNum;
            }
        }

        function closeTrackingModal() {
            document.getElementById('trackingModal').classList.add('hidden');
            document.getElementById('trackingModal').classList.remove('flex');
            document.getElementById('trackingResult').classList.add('hidden');
        }

        async function submitTracking(e) {
            e.preventDefault();
            const ticket = document.getElementById('modalTicketInput').value;
            const resDiv = document.getElementById('trackingResult');
            resDiv.classList.remove('hidden');
            resDiv.className = "mt-4 p-4 rounded-xl border bg-slate-50 border-slate-200 text-slate-600 text-center text-xs animate-pulse";
            resDiv.innerHTML = "Memeriksa database permohonan...";

            try {
                const response = await fetch('{{ route("tracking.search") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ ticket: ticket })
                });
                const data = await response.json();

                if (data.found) {
                    resDiv.className = "mt-4 p-4 rounded-xl border border-teal-200 bg-teal-50/60 text-slate-700 text-xs space-y-2";
                    resDiv.innerHTML = `
                        <div class="flex justify-between items-center border-b border-teal-200/60 pb-2">
                            <span class="font-mono font-bold text-teal-700">#${data.ticket_number}</span>
                            <span class="bg-teal-600 text-white font-bold text-[10px] px-2.5 py-0.5 rounded-full uppercase">${data.status_label}</span>
                        </div>
                        <div><strong class="text-slate-800">Pemohon:</strong> ${data.name}</div>
                        <div><strong class="text-slate-800">Tahapan:</strong> ${data.stage}</div>
                        <div><strong class="text-slate-800">Estimasi Selesai:</strong> ${data.estimate}</div>
                        ${data.response_notes ? `<div class="mt-2 p-2 bg-white rounded border border-teal-100"><strong>Catatan Petugas:</strong> ${data.response_notes}</div>` : ''}
                    `;
                } else {
                    resDiv.className = "mt-4 p-4 rounded-xl border border-rose-200 bg-rose-50 text-rose-700 text-xs text-center font-medium";
                    resDiv.innerHTML = data.message || "Nomor tiket tidak ditemukan.";
                }
            } catch (err) {
                resDiv.className = "mt-4 p-4 rounded-xl border border-rose-200 bg-rose-50 text-rose-700 text-xs text-center font-medium";
                resDiv.innerHTML = "Terjadi kesalahan koneksi ke server.";
            }
        }

        // Realtime Visitor Statistics Polling (Every 15 Seconds)
        async function updateVisitorStats() {
            try {
                const res = await fetch('/api/visitor-stats');
                if (res.ok) {
                    const data = await res.json();
                    if (data.success && data.stats) {
                        const elOnline = document.getElementById('statVisitorOnline');
                        const elToday = document.getElementById('statVisitorToday');
                        const elMonth = document.getElementById('statVisitorMonth');
                        const elTotal = document.getElementById('statVisitorTotal');

                        if (elOnline) elOnline.textContent = new Intl.NumberFormat().format(data.stats.online);
                        if (elToday) elToday.textContent = new Intl.NumberFormat().format(data.stats.today);
                        if (elMonth) elMonth.textContent = new Intl.NumberFormat().format(data.stats.month);
                        if (elTotal) elTotal.textContent = new Intl.NumberFormat().format(data.stats.total);
                    }
                }
            } catch (e) {
                // Silently ignore polling errors
            }
        }

        // Poll stats every 15 seconds
        setInterval(updateVisitorStats, 15000);
    </script>
</body>
</html>
