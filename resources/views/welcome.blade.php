<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nia Salon — Kecantikan Adalah Seni</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Poppins:wght@300;400;500;600&display=swap"
          rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --color-pink-soft:   #fce7f3;
            --color-pink-light:  #fbcfe8;
            --color-pink-accent: #ec4899;
            --color-pink-deep:   #db2777;
            --color-cream:       #fdf6f0;
            --color-text-dark:   #1f1f1f;
            --color-text-muted:  #6b7280;
            --font-display:      'Playfair Display', Georgia, serif;
            --font-body:         'Poppins', sans-serif;
        }
        * { box-sizing: border-box; }
        body {
            font-family: var(--font-body);
            color: var(--color-text-dark);
            background-color: #fff;
            overflow-x: hidden;
        }
        h1, h2, h3 { font-family: var(--font-display); }

        #navbar {
            transition: background 0.4s ease, box-shadow 0.4s ease,
                        backdrop-filter 0.4s ease;
        }
        #navbar.scrolled {
            background: rgba(255,255,255,0.85) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 2px 20px rgba(236,72,153,0.10);
        }

        .search-bar input:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--color-pink-accent);
        }

        .hero-section {
            background-image:
                linear-gradient(
                    135deg,
                    rgba(253,246,240,0.92) 0%,
                    rgba(252,231,243,0.80) 50%,
                    rgba(251,207,232,0.70) 100%
                ),
                url('https://images.unsplash.com/photo-1560066984-138dadb4c035?w=1600&q=80');
            background-size: cover;
            background-position: center 30%;
            background-attachment: fixed;
        }

        .salon-card {
            transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1),
                        box-shadow 0.35s ease;
        }
        .salon-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(236,72,153,0.15),
                        0 6px 12px rgba(0,0,0,0.06);
        }
        .salon-card:hover .card-img { transform: scale(1.06); }
        .card-img { transition: transform 0.5s ease; }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-body);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--color-pink-accent);
        }
        .section-label::before, .section-label::after {
            content: '';
            display: block;
            width: 32px;
            height: 1px;
            background: var(--color-pink-accent);
        }

        .wa-btn { animation: wa-pulse 2.5s infinite; }
        @keyframes wa-pulse {
            0%,100% { box-shadow: 0 0 0 0 rgba(37,211,102,0.5); }
            50%      { box-shadow: 0 0 0 12px rgba(37,211,102,0); }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-up.visible { opacity: 1; transform: translateY(0); }
        .fade-up:nth-child(1) { transition-delay: 0.05s; }
        .fade-up:nth-child(2) { transition-delay: 0.12s; }
        .fade-up:nth-child(3) { transition-delay: 0.19s; }
        .fade-up:nth-child(4) { transition-delay: 0.26s; }
        .fade-up:nth-child(5) { transition-delay: 0.33s; }
        .fade-up:nth-child(6) { transition-delay: 0.40s; }
        .fade-up:nth-child(7) { transition-delay: 0.47s; }
        .fade-up:nth-child(8) { transition-delay: 0.54s; }

        .footer-link { position: relative; transition: color 0.25s ease; }
        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 0;
            width: 0; height: 1px;
            background: var(--color-pink-deep);
            transition: width 0.3s ease;
        }
        .footer-link:hover::after { width: 100%; }
        .footer-link:hover { color: var(--color-pink-deep); }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #fff; }
        ::-webkit-scrollbar-thumb {
            background: var(--color-pink-light);
            border-radius: 9999px;
        }
    </style>
</head>

<body>

{{-- ── FLOATING WHATSAPP ── --}}
<a href="https://wa.me/6285862499133?text=Halo%20Nia%20Salon%2C%20saya%20ingin%20reservasi!"
   target="_blank" rel="noopener"
   class="wa-btn fixed bottom-6 right-6 z-50 bg-green-500 text-white
          w-14 h-14 rounded-full flex items-center justify-center shadow-lg
          hover:bg-green-600 transition-colors"
   title="Chat via WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.555 4.122 1.528 5.855L.057 23.882a.5.5 0 00.609.61l6.102-1.459A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.882a9.86 9.86 0 01-5.034-1.376l-.36-.214-3.733.893.922-3.65-.234-.375A9.862 9.862 0 012.118 12C2.118 6.533 6.533 2.118 12 2.118S21.882 6.533 21.882 12 17.467 21.882 12 21.882z"/>
    </svg>
</a>

{{-- ══════════════════════════════════════════
     NAVBAR (selalu tampil, search + search mode)
══════════════════════════════════════════ --}}
<nav id="navbar" class="fixed top-0 left-0 right-0 z-40 bg-transparent py-4 px-6 lg:px-12 transition-all">
    <div class="max-w-7xl mx-auto flex items-center justify-between gap-6">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-2 group">
            <div class="w-9 h-9 rounded-full bg-pink-500 flex items-center justify-center
                        shadow-md group-hover:scale-105 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                    <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                    <line x1="9" y1="9" x2="9.01" y2="9"/>
                    <line x1="15" y1="9" x2="15.01" y2="9"/>
                </svg>
            </div>
            <span style="font-family: var(--font-display);"
                  class="text-xl font-bold text-gray-800 tracking-tight
                         group-hover:text-pink-600 transition-colors">
                Nia Salon
            </span>
        </a>

        {{-- Mobile Menu Button (Hamburger) --}}
        <button id="mobile-menu-btn" class="md:hidden text-gray-800 hover:text-pink-600 focus:outline-none">
            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Desktop Menu --}}
        <div class="hidden md:flex flex-1 items-center gap-6">
            {{-- Search Bar --}}
            <form action="{{ route('home') }}" method="GET" class="search-bar flex-1 max-w-sm mx-auto">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-pink-400"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari layanan atau produk..."
                           class="w-full pl-10 pr-4 py-2.5 rounded-full border border-pink-200
                                  bg-white/80 text-sm text-gray-700 placeholder-gray-400
                                  focus:ring-2 focus:ring-pink-300 focus:border-transparent
                                  transition-all" />
                </div>
            </form>

            {{-- Nav Links --}}
            <div class="flex items-center gap-1 ml-auto">
                @if(!request('search'))
                    <a href="#katalog-jasa"
                       class="text-sm font-medium text-gray-700 hover:text-pink-600 px-3 py-2
                              rounded-lg hover:bg-pink-50 transition-all">
                        Jasa
                    </a>
                    <a href="#katalog-produk"
                       class="text-sm font-medium text-gray-700 hover:text-pink-600 px-3 py-2
                              rounded-lg hover:bg-pink-50 transition-all">
                        Produk
                    </a>
                @endif
                <a href="#kontak"
                   class="ml-2 text-sm font-semibold text-white bg-pink-500 hover:bg-pink-600
                          px-5 py-2.5 rounded-full transition-all shadow-sm">
                    Reservasi
                </a>
            </div>
        </div>
    </div>

    {{-- Mobile Dropdown Menu --}}
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-xl border-t border-pink-100 py-4 px-6 flex-col gap-4">
        <form action="{{ route('home') }}" method="GET" class="w-full">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari layanan atau produk..." class="w-full pl-10 pr-4 py-2.5 rounded-full border border-pink-200 bg-white text-sm text-gray-700 focus:ring-2 focus:ring-pink-300 transition-all" />
            </div>
        </form>
        <div class="flex flex-col gap-1 mt-2">
            @if(!request('search'))
                <a href="#katalog-jasa" class="text-base font-medium text-gray-700 hover:text-pink-600 py-2 border-b border-gray-50">Jasa</a>
                <a href="#katalog-produk" class="text-base font-medium text-gray-700 hover:text-pink-600 py-2 border-b border-gray-50">Produk</a>
            @endif
            <a href="#kontak" class="text-center text-sm font-semibold text-white bg-pink-500 hover:bg-pink-600 px-5 py-3 rounded-full transition-all shadow-sm mt-4 w-full">
                Reservasi Sekarang
            </a>
        </div>
    </div>
</nav>
{{-- ── AKHIR NAVBAR ── --}}


{{-- ══════════════════════════════════════════════════════════════════
     KONDISIONAL UTAMA
══════════════════════════════════════════════════════════════════ --}}
@if(request('search'))

    {{-- ╔══════════════════════════════════════════╗
         ║  HALAMAN HASIL PENCARIAN                ║
         ╚══════════════════════════════════════════╝ --}}
    <div class="min-h-screen pt-24 pb-20 px-6 lg:px-12"
         style="background: linear-gradient(135deg, #fdf2f8 0%, #ffffff 60%);">
        <div class="max-w-7xl mx-auto">

            {{-- ── Header Hasil Pencarian ── --}}
            <div class="mb-10">

                {{-- Tombol Kembali ke Beranda --}}
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-pink-600
                          hover:text-pink-800 bg-white border border-pink-200 hover:border-pink-400
                          px-5 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md
                          mb-6 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:-translate-x-1
                         transition-transform" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Beranda
                </a>

                {{-- Judul --}}
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <p class="text-xs font-semibold text-pink-500 uppercase tracking-widest mb-1">
                            Hasil Pencarian
                        </p>
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900"
                            style="font-family: var(--font-display);">
                            Hasil untuk:
                            <span class="italic text-pink-500">
                                "{{ request('search') }}"
                            </span>
                        </h1>
                        <p class="text-sm text-gray-400 mt-1">
                            Ditemukan
                            <strong class="text-gray-600">{{ $searchResults->count() }}</strong>
                            hasil pencarian
                        </p>
                    </div>

                    {{-- Form search ulang (mobile) --}}
                    <form action="{{ route('home') }}" method="GET"
                          class="flex items-center gap-2 w-full sm:w-auto md:hidden">
                        <div class="relative flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-pink-400"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" name="search"
                                   value="{{ request('search') }}"
                                   class="w-full pl-10 pr-4 py-2.5 rounded-full border border-pink-200
                                          text-sm bg-white focus:outline-none focus:ring-2
                                          focus:ring-pink-300" />
                        </div>
                        <button type="submit"
                                class="bg-pink-500 text-white px-4 py-2.5 rounded-full text-sm
                                       font-semibold hover:bg-pink-600 transition-colors shrink-0">
                            Cari
                        </button>
                    </form>
                </div>
            </div>

            {{-- ── Grid Hasil Pencarian ── --}}
            @if($searchResults->isEmpty())

                {{-- State kosong --}}
                <div class="text-center py-24">
                    <div class="w-24 h-24 rounded-full bg-pink-50 border-2 border-dashed
                                border-pink-200 flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-pink-300"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700 mb-2"
                        style="font-family: var(--font-display);">
                        Tidak Ada Hasil
                    </h3>
                    <p class="text-gray-400 text-sm max-w-sm mx-auto mb-6">
                        Pencarian untuk <strong>"{{ request('search') }}"</strong> tidak menemukan
                        layanan atau produk yang cocok.
                    </p>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600
                              text-white font-semibold px-6 py-3 rounded-full transition-all
                              shadow-md shadow-pink-200">
                        Lihat Semua Layanan
                    </a>
                </div>

            @else

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                    @foreach($searchResults as $item)
                        <a href="{{ route('service.show', $item->id) }}"
                           class="salon-card bg-white rounded-2xl overflow-hidden border
                                  border-pink-50 shadow-sm group block no-underline
                                  flex flex-col">

                            <div class="relative">
                                <div class="h-44 bg-pink-50 overflow-hidden">
                                    @if($item->image_path)
                                        <img src="{{ Storage::url($item->image_path) }}"
                                             alt="{{ $item->title }}"
                                             class="card-img w-full h-full object-cover" />
                                    @else
                                        <div class="w-full h-full flex items-center justify-center
                                                    bg-gradient-to-br from-pink-50 to-rose-50">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-10 h-10 text-pink-200" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586
                                                         a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2
                                                         0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <span class="absolute top-3 left-3 text-xs font-bold px-2.5 py-1
                                             rounded-full
                                             {{ $item->category === 'product'
                                                ? 'bg-purple-100 text-purple-700'
                                                : 'bg-pink-100 text-pink-700' }}">
                                    {{ $item->category === 'product' ? '🛍️ Produk' : '✂️ Jasa' }}
                                </span>
                            </div>

                            <div class="p-4 flex flex-col flex-1 gap-2">
                                <h3 class="font-semibold text-gray-800 text-sm leading-snug
                                           group-hover:text-pink-600 transition-colors line-clamp-2">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-xs text-gray-400 font-light leading-relaxed
                                          line-clamp-2 flex-1">
                                    {{ $item->description }}
                                </p>
                                <div class="flex items-center justify-between pt-2 border-t border-pink-50">
                                    <span class="text-sm font-bold text-pink-500">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs font-semibold text-pink-500
                                                 group-hover:text-pink-700 transition-colors">
                                        Lihat →
                                    </span>
                                </div>
                            </div>

                        </a>
                    @endforeach

                </div>

            @endif

        </div>
    </div>


@else

    {{-- ╔══════════════════════════════════════════════════════════╗
         ║  LANDING PAGE NORMAL                                    ║
         ╚══════════════════════════════════════════════════════════╝ --}}

    {{-- ── HERO SECTION ── --}}
    <section class="hero-section min-h-screen flex items-center justify-center
                    relative overflow-hidden">

        <div class="absolute top-20 right-10 w-80 h-80 bg-pink-300 rounded-full
                    opacity-20 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-10 w-60 h-60 bg-pink-200 rounded-full
                    opacity-25 blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-32 grid lg:grid-cols-2 gap-12 items-center">

            <div class="text-center lg:text-left space-y-7 mt-10 md:mt-0">
                <div class="inline-flex items-center gap-3 bg-white/70 backdrop-blur-sm
                            border border-pink-200 rounded-full px-4 py-1.5 mt-8 md:mt-0">
                    <span class="w-2 h-2 rounded-full bg-pink-400 animate-pulse"></span>
                    <span class="text-xs font-semibold text-pink-600 tracking-widest uppercase">
                        Premium Beauty Experience
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight text-gray-900">
                    Temukan
                    <span class="block italic text-pink-500" style="font-family: var(--font-display);">
                        Kecantikan
                    </span>
                    <span class="block">Terbaik Anda</span>
                </h1>

                <p class="text-base lg:text-lg text-gray-500 font-light leading-relaxed
                          max-w-md mx-auto lg:mx-0">
                    Kami hadir untuk merawat Anda dengan sentuhan profesional dan dynamic product terpilih.
                    Karena setiap wanita berhak merasa cantik setiap hari.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start pt-2">
                    <a href="#katalog-jasa"
                       class="inline-flex items-center justify-center gap-2 bg-pink-500
                              hover:bg-pink-600 text-white font-semibold px-8 py-4
                              rounded-full transition-all shadow-lg shadow-pink-200
                              hover:shadow-pink-300 hover:-translate-y-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3l14 9-14 9V3z"/>
                        </svg>
                        Lihat Layanan
                    </a>
                    <a href="#kontak"
                       class="inline-flex items-center justify-center gap-2 bg-white
                              hover:bg-pink-50 text-pink-600 font-semibold px-8 py-4
                              rounded-full transition-all border border-pink-200
                              hover:border-pink-400 hover:-translate-y-0.5">
                        Reservasi Sekarang
                    </a>
                </div>

                <div class="flex flex-wrap items-center gap-4 sm:gap-8 pt-4 justify-center lg:justify-start">
                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-pink-600" style="font-family: var(--font-display);">
                            1000+
                        </p>
                        <p class="text-xs text-gray-400 font-medium">Pelanggan Puas</p>
                    </div>
                    <div class="w-px h-10 bg-pink-200 hidden sm:block"></div>
                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-pink-600" style="font-family: var(--font-display);">
                            30+
                        </p>
                        <p class="text-xs text-gray-400 font-medium">Jenis Layanan</p>
                    </div>
                    <div class="w-px h-10 bg-pink-200 hidden sm:block"></div>
                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-pink-600" style="font-family: var(--font-display);">
                            5★
                        </p>
                        <p class="text-xs text-gray-400 font-medium">Rating Salon</p>
                    </div>
                </div>
            </div>

            <div class="hidden lg:flex items-center justify-center relative">
                <div class="relative w-80 h-80 xl:w-96 xl:h-96">
                    <div class="absolute inset-0 rounded-full border-2 border-dashed border-pink-200
                                animate-[spin_20s_linear_infinite]"></div>
                    <div class="absolute inset-6 rounded-full border border-pink-100"></div>
                    <div class="absolute inset-8 rounded-full overflow-hidden shadow-2xl
                                shadow-pink-200 border-4 border-white">
                        <img src="https://i1-e.pinimg.com/1200x/b8/01/0f/b8010fca48410e5c50f46b97aa8b9d1d.jpg"
                             alt="Nia Salon Interior"
                             class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute -bottom-2 -left-4 bg-white rounded-2xl shadow-xl
                                border border-pink-100 px-4 py-3 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-500"
                                 fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Rating</p>
                            <p class="text-sm font-bold text-gray-800">5.0 / 5.0</p>
                        </div>
                    </div>

                    <div id="hero-status-badge" class="absolute -top-2 -right-4 text-white rounded-2xl shadow-xl px-4 py-3 transition-colors duration-300">
                        <p id="hero-status-text" class="text-xs text-pink-200 font-medium uppercase tracking-wider"></p>
                        <p id="hero-time-text" class="text-sm font-bold mt-0.5" style="font-family: var(--font-body);"></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center
                    gap-2 text-gray-400 animate-bounce">
            <span class="text-xs font-medium tracking-widest uppercase">Scroll</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </section>
    {{-- ── AKHIR HERO ── --}}


    {{-- ════════════════════════════════════════════════
         SECTION KATALOG JASA SALON
    ════════════════════════════════════════════════ --}}
    <section id="katalog-jasa" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16 fade-up">
                <span class="section-label justify-center mb-4">Perawatan Tubuh & Rambut</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900"
                    style="font-family: 'Playfair Display', serif;">
                    Layanan Unggulan Kami
                </h2>
                <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                    Nikmati perawatan terbaik dari tenaga profesional kami untuk hasil yang memukau.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($services as $service)

                    <a href="{{ route('service.show', $service->id) }}"
                       class="salon-card bg-white rounded-3xl overflow-hidden shadow-sm
                              border border-pink-50 fade-up flex flex-col justify-between
                              group no-underline block">

                        <div class="relative h-52 bg-pink-50 overflow-hidden">
                            @if($service->image_path)
                                <img src="{{ Storage::url($service->image_path) }}"
                                     alt="{{ $service->title }}"
                                     class="card-img w-full h-full object-cover" />
                            @else
                                <div class="w-full h-full flex items-center justify-center
                                            bg-gradient-to-br from-pink-50 to-pink-100">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-12 h-12 text-pink-200" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586
                                                 a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2
                                                 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm
                                        text-pink-600 text-xs font-bold px-3 py-1.5 rounded-full
                                        shadow-sm border border-pink-100">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-1 gap-3">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-pink-600
                                       transition-colors leading-snug">
                                {{ $service->title }}
                            </h3>
                            <p class="text-sm text-gray-400 font-light leading-relaxed
                                      line-clamp-3 flex-1">
                                {{ $service->description }}
                            </p>
                            <div class="flex items-center justify-between pt-2 border-t border-pink-50">
                                <span class="text-lg font-bold text-pink-500">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </span>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold
                                             text-white bg-pink-500 group-hover:bg-pink-600
                                             px-4 py-2 rounded-full transition-colors">
                                    Lihat Detail
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                         stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                    </a>

                @empty
                    <div class="col-span-full text-center py-20">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-16 w-16 mx-auto mb-4 text-gray-200"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2
                                     0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                        <p class="text-gray-400">Layanan salon belum tersedia.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
    {{-- ── AKHIR KATALOG JASA ── --}}


    {{-- ── BANNER QUOTE ── --}}
    <div class="bg-gradient-to-r from-pink-500 via-pink-400 to-rose-400 py-16 px-6
                overflow-hidden relative">
        <div class="absolute inset-0 opacity-10"
             style="background-image: radial-gradient(circle at 20% 50%, white 1px, transparent 1px),
                    radial-gradient(circle at 80% 50%, white 1px, transparent 1px);
                    background-size: 60px 60px;">
        </div>
        <div class="max-w-3xl mx-auto text-center text-white relative z-10">
            <p class="text-3xl lg:text-4xl font-light italic leading-snug"
               style="font-family: var(--font-display);">
                "Kecantikan bukan tentang sempurna —
                <br class="hidden md:block"/>
                <strong class="font-bold not-italic">ini tentang merasakan diri yang terbaik."</strong>
            </p>
            <p class="mt-4 text-pink-100 text-sm tracking-widest">— NIA SALON</p>
        </div>
    </div>


    {{-- ════════════════════════════════════════════════
         SECTION KATALOG PRODUK KECANTIKAN
    ════════════════════════════════════════════════ --}}
    <section id="katalog-produk" class="py-24 px-6 lg:px-12"
             style="background-color: var(--color-cream);">
        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-16">
                <div class="section-label justify-center mb-4">
                    Koleksi Skincare & Kosmetik
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                    Produk
                    <span class="italic text-pink-500">Kecantikan</span>
                </h2>
                <p class="text-base text-gray-400 max-w-xl mx-auto font-light">
                    Temukan rangkaian produk perawatan dan kosmetik pilihan kami —
                    teruji, terpercaya, dan siap membuat Anda bersinar.
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5 lg:gap-6">
                @forelse($products as $item)

                    <div class="salon-card fade-up bg-white rounded-2xl overflow-hidden
                                border border-pink-50 flex flex-col justify-between
                                shadow-sm group">

                        <a href="{{ route('service.show', $item->id) }}"
                           class="block no-underline flex-1">
                            <div class="relative aspect-square bg-pink-50 overflow-hidden">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                         alt="{{ $item->title }}"
                                         class="card-img w-full h-full object-cover" />
                                @else
                                    <div class="w-full h-full flex items-center justify-center
                                                bg-gradient-to-br from-pink-50 to-rose-50">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-12 h-12 text-pink-200" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-pink-500/10 opacity-0
                                            group-hover:opacity-100 transition-opacity duration-300
                                            flex items-center justify-center">
                                    <span class="bg-white text-pink-600 text-xs font-semibold px-3 py-1.5
                                                 rounded-full shadow translate-y-4 opacity-0
                                                 group-hover:opacity-100 group-hover:translate-y-0
                                                 transition-all duration-300">
                                        Lihat Detail
                                    </span>
                                </div>
                            </div>
                            <div class="p-4 space-y-1.5">
                                <h3 class="text-sm font-semibold text-gray-800 leading-snug
                                           group-hover:text-pink-600 transition-colors line-clamp-2">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-xs text-gray-400 font-light line-clamp-2 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </a>

                        <div class="p-4 pt-0 flex items-center justify-between mt-auto">
                            <span class="text-sm font-bold text-pink-500">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </span>
                            <a href="https://wa.me/6285862499133?text=Halo%2C%20saya%20ingin%20order%20produk%3A%20{{ urlencode($item->title) }}"
                               target="_blank" rel="noopener"
                               class="flex items-center justify-center w-8 h-8 rounded-full
                                      bg-pink-100 hover:bg-pink-500 text-pink-500 hover:text-white
                                      transition-all shadow-sm"
                               title="Pesan via WhatsApp">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </a>
                        </div>

                    </div>

                @empty
                    <div class="col-span-full text-center py-20 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <p class="text-lg text-gray-400">Produk akan segera hadir.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
    {{-- ── AKHIR KATALOG PRODUK ── --}}


    {{-- ── FOOTER ── --}}
    <footer id="kontak" style="background-color: #fce7f3;">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 pt-16 pb-10">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-full bg-pink-500 flex items-center justify-center shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                                <line x1="9" y1="9" x2="9.01" y2="9"/>
                                <line x1="15" y1="9" x2="15.01" y2="9"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-800"
                              style="font-family: var(--font-display);">
                            Nia Salon
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 font-light leading-relaxed">
                        Salon kecantikan premium yang menghadirkan pengalaman perawatan terbaik
                        dengan produk berkualitas tinggi.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://instagram.com/nia_salon_gemolong" target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full bg-white border border-pink-200
                                  flex items-center justify-center text-pink-500
                                  hover:bg-pink-500 hover:text-white hover:border-pink-500
                                  transition-all shadow-sm" title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://tiktok.com/@niasalongemolong05" target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full bg-white border border-pink-200
                                  flex items-center justify-center text-pink-500
                                  hover:bg-pink-500 hover:text-white hover:border-pink-500
                                  transition-all shadow-sm" title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.75a8.18 8.18 0 004.78 1.54V6.84a4.85 4.85 0 01-1.01-.15z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/6285862499133" target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full bg-white border border-pink-200
                                  flex items-center justify-center text-pink-500
                                  hover:bg-green-500 hover:text-white hover:border-green-500
                                  transition-all shadow-sm" title="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 0C5.373 0 0 5.373 0 12c0 2.126.555 4.122 1.528 5.855L.057 23.882a.5.5 0 00.609.61l6.102-1.459A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.882a9.86 9.86 0 01-5.034-1.376l-.36-.214-3.733.893.922-3.65-.234-.375A9.862 9.862 0 012.118 12C2.118 6.533 6.533 2.118 12 2.118S21.882 6.533 21.882 12 17.467 21.882 12 21.882z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-gray-700 uppercase tracking-widest mb-5">Menu</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="footer-link text-sm text-gray-500">Beranda</a></li>
                        <li><a href="#katalog-jasa" class="footer-link text-sm text-gray-500">Katalog Jasa</a></li>
                        <li><a href="#katalog-produk" class="footer-link text-sm text-gray-500">Produk Kecantikan</a></li>
                        <li><a href="#kontak" class="footer-link text-sm text-gray-500">Kontak Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-gray-700 uppercase tracking-widest mb-5">
                        Jam Operasional
                    </h4>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li class="flex items-center justify-between">
                            <span>Senin – Jumat</span>
                            <span class="font-semibold text-pink-600">09:00 – 17:00</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span>Sabtu</span>
                            <span class="font-semibold text-pink-600">10:00 – 17:00</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span>Minggu</span>
                            <span class="font-semibold text-pink-600">11:00 – 17:00</span>
                        </li>
                    </ul>

                    <div id="footer-status-badge" class="mt-5 inline-flex items-center gap-2 bg-white/70 border border-pink-200 rounded-full px-3 py-1.5 transition-colors duration-300">
                        <span id="footer-status-dot" class="w-2 h-2 rounded-full"></span>
                        <span id="footer-status-text" class="text-xs font-semibold"></span>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-gray-700 uppercase tracking-widest mb-5">
                        Hubungi Kami
                    </h4>
                    <ul class="space-y-4 text-sm text-gray-500">
                        <li class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4 text-pink-400 mt-0.5 shrink-0" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="leading-relaxed">
                                Jl. Gemolong-Sragen, Dusun 1, Tegaldowo,<br/>
                                Kec. Gemolong, Sragen, Jawa Tengah 57274
                            </span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4 text-pink-400 shrink-0" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="https://wa.me/6285862499133" target="_blank" rel="noopener"
                               class="footer-link">+62 858-6249-9133</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-pink-200 pt-8 flex flex-col sm:flex-row items-center
                        justify-between gap-4">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} Nia Salon. Hak Cipta Dilindungi.
                </p>
                <p class="text-xs text-gray-400 italic">
                    Nia Salon — <span class="text-pink-500 font-semibold">Kecantikan Adalah Seni</span>
                </p>
            </div>

        </div>
    </footer>
    {{-- ── AKHIR FOOTER ── --}}


@endif
{{-- ══ AKHIR KONDISIONAL @if(request('search')) ... @else ... @endif ══ --}}


<script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });

    // Mobile Menu Toggle Fix
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if(mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
            
            // Tambahkan background solid ke navbar jika menu dibuka dan posisi sedang di atas
            if (!navbar.classList.contains('scrolled') && !mobileMenu.classList.contains('hidden')) {
                navbar.style.background = 'rgba(255,255,255,0.98)';
                navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.05)';
            } else if (!navbar.classList.contains('scrolled')) {
                navbar.style.background = 'transparent';
                navbar.style.boxShadow = 'none';
            }
        });
    }

    // Fade-up observer (hanya untuk landing page, bukan search page)
    const fadeEls = document.querySelectorAll('.fade-up');
    if (fadeEls.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        fadeEls.forEach(el => observer.observe(el));
    }

    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                // Tutup mobile menu setelah klik link
                if(mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                    if (!navbar.classList.contains('scrolled')) {
                        navbar.style.background = 'transparent';
                        navbar.style.boxShadow = 'none';
                    }
                }
            }
        });
    });

    // ============================================================
    // JAM OPERASIONAL DINAMIS — Nia Salon (LOGIKA REAL-TIME BARU)
    // ============================================================
    (function niaSalonStatusRealtime() {
        // Definisikan jadwal valid sesuai dengan teks jam operasional pada screenshot footer kamu
        const JADWAL_SALON = {
            1: { buka: 9,  tutup: 17, display: "09:00 – 17:00" }, // Senin (Menggunakan layout asli dari display screenshot)
            2: { buka: 9,  tutup: 17, display: "09:00 – 17:00" }, // Selasa
            3: { buka: 9,  tutup: 17, display: "09:00 – 17:00" }, // Rabu
            4: { buka: 9,  tutup: 17, display: "09:00 – 17:00" }, // Kamis
            5: { buka: 9,  tutup: 17, display: "09:00 – 17:00" }, // Jumat
            6: { buka: 10, tutup: 17, display: "10:00 – 17:00" }, // Sabtu
            0: { buka: 11, tutup: 17, display: "11:00 – 17:00" }  // Minggu
        };

        const heroBadge = document.getElementById('hero-status-badge');
        const heroText  = document.getElementById('hero-status-text');
        const heroTime  = document.getElementById('hero-time-text');

        const footerBadge = document.getElementById('footer-status-badge');
        const footerDot   = document.getElementById('footer-status-dot');
        const footerText  = document.getElementById('footer-status-text');

        function perbaruiStatusKerja() {
            const sekarang = new Date();
            const hariIni  = sekarang.getDay(); 
            const jam      = sekarang.getHours();
            const menit    = sekarang.getMinutes();
            const waktuDesimal = jam + (menit / 60);

            const aturanMain = JADWAL_SALON[hariIni];
            // Mengecek apakah jam saat ini berada di dalam range buka & tutup salon
            const statusBuka = (waktuDesimal >= aturanMain.buka && waktuDesimal < aturanMain.tutup);

            // Teks display bawaan dari mockup gambar hero awal kamu
            const teksDisplayGambarHero = "10:00 – 17:00"; 

            // 1. Sinkronisasi Badge pada Sektor Hero Image
            if (heroBadge && heroText && heroTime) {
                if (statusBuka) {
                    heroBadge.className = "absolute -top-2 -right-4 bg-pink-500 text-white rounded-2xl shadow-xl px-4 py-3 transition-colors duration-300";
                    heroText.textContent = "Buka Hari Ini";
                    heroTime.textContent = teksDisplayGambarHero;
                } else {
                    heroBadge.className = "absolute -top-2 -right-4 bg-gray-700 text-white rounded-2xl shadow-xl px-4 py-3 transition-colors duration-300";
                    heroText.textContent = "Sedang Tutup";
                    heroTime.textContent = `Buka Jam ${aturanMain.buka.toString().padStart(2, '0')}.00`;
                }
            }

            // 2. Sinkronisasi Badge pada Sektor Footer
            if (footerBadge && footerDot && footerText) {
                if (statusBuka) {
                    footerBadge.className = "mt-5 inline-flex items-center gap-2 bg-white/70 border border-pink-200 rounded-full px-3 py-1.5 transition-colors duration-300";
                    footerDot.className = "w-2 h-2 rounded-full bg-green-400 animate-pulse";
                    footerText.className = "text-xs font-semibold text-green-700";
                    footerText.textContent = "Sedang Buka";
                } else {
                    footerBadge.className = "mt-5 inline-flex items-center gap-2 bg-red-50 border border-red-200 rounded-full px-3 py-1.5 transition-colors duration-300";
                    footerDot.className = "w-2 h-2 rounded-full bg-red-400";
                    footerText.className = "text-xs font-semibold text-red-600";
                    footerText.textContent = "Sedang Tutup";
                }
            }
        }

        perbaruiStatusKerja();
        setInterval(perbaruiStatusKerja, 30000); // Sinkronisasi jam setiap 30 detik
    })();
</script>

</body>
</html>