<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $product->name }} — Nia Salon</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Poppins:wght@300;400;500;600&display=swap"
          rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body:    'Poppins', sans-serif;
        }

        * { box-sizing: border-box; }

        body {
            font-family: var(--font-body);
            background-color: #fff;
            color: #1f1f1f;
            overflow-x: hidden;
        }

        h1, h2, h3 { font-family: var(--font-display); }

        #navbar {
            transition: background 0.4s ease, box-shadow 0.4s ease;
        }
        #navbar.scrolled {
            background: rgba(255,255,255,0.90) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 20px rgba(236,72,153,0.10);
        }

        .hero-img { transition: transform 0.6s ease; }
        .hero-img:hover { transform: scale(1.02); }

        /* Pulse WA */
        .wa-pulse {
            animation: pulse-wa 2.5s infinite;
        }
        @keyframes pulse-wa {
            0%, 100% { box-shadow: 0 0 0 0 rgba(37,211,102,0.45); }
            50%       { box-shadow: 0 0 0 14px rgba(37,211,102,0); }
        }

        .related-card {
            transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease;
        }
        .related-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(236,72,153,0.14);
        }
        .related-card img { transition: transform 0.5s ease; }
        .related-card:hover img { transform: scale(1.06); }

        .breadcrumb-sep::before {
            content: '/';
            margin: 0 8px;
            color: #d1d5db;
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #fff; }
        ::-webkit-scrollbar-thumb { background: #fbcfe8; border-radius: 9999px; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-in { animation: fadeInUp 0.6s ease forwards; }
        .delay-1 { animation-delay: 0.1s; opacity: 0; }
        .delay-2 { animation-delay: 0.2s; opacity: 0; }
        .delay-3 { animation-delay: 0.3s; opacity: 0; }
        .delay-4 { animation-delay: 0.4s; opacity: 0; }
        .delay-5 { animation-delay: 0.5s; opacity: 0; }
    </style>
</head>
<body>

<!-- Floating WA (tombol bulat, selalu tampil di semua ukuran layar) -->
<a href="https://wa.me/6285862499133?text=Halo%20admin%20Nia%20Salon%2C%20saya%20ingin%20bertanya%20tentang%20produk%3A%20*{{ urlencode($product->name) }}*"
   target="_blank" rel="noopener"
   class="wa-pulse fixed bottom-6 right-6 z-50 bg-green-500 text-white w-14 h-14
          rounded-full flex items-center justify-center shadow-xl hover:bg-green-600
          transition-colors"
   title="Chat via WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.555 4.122 1.528 5.855L.057 23.882a.5.5 0 00.609.61l6.102-1.459A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.882a9.86 9.86 0 01-5.034-1.376l-.36-.214-3.733.893.922-3.65-.234-.375A9.862 9.862 0 012.118 12C2.118 6.533 6.533 2.118 12 2.118S21.882 6.533 21.882 12 17.467 21.882 12 21.882z"/>
    </svg>
</a>

<!-- Navbar -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-40 bg-white/80 py-4 px-6 lg:px-12
                        border-b border-pink-100">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <div class="w-9 h-9 rounded-full bg-pink-500 flex items-center justify-center shadow
                        group-hover:scale-105 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                    <line x1="9" y1="9" x2="9.01" y2="9"/>
                    <line x1="15" y1="9" x2="15.01" y2="9"/>
                </svg>
            </div>
            <span style="font-family: var(--font-display);"
                  class="text-xl font-bold text-gray-800 group-hover:text-pink-600 transition-colors">
                Nia Salon
            </span>
        </a>

        <!-- Menu Kanan — DISEMBUNYIKAN di mobile, tampil di md ke atas -->
        <div class="hidden md:flex items-center gap-1">
            <a href="{{ route('home') }}"
               class="text-sm font-medium text-gray-600 hover:text-pink-600 px-3 py-2
                      rounded-lg hover:bg-pink-50 transition-all">Home</a>
            <a href="{{ route('home') }}#katalog-jasa"
               class="text-sm font-medium text-gray-600 hover:text-pink-600 px-3 py-2
                      rounded-lg hover:bg-pink-50 transition-all">Jasa</a>
            <a href="{{ route('home') }}#katalog-produk"
               class="text-sm font-medium text-gray-600 hover:text-pink-600 px-3 py-2
                      rounded-lg hover:bg-pink-50 transition-all">Produk</a>
            <a href="https://wa.me/6285862499133" target="_blank" rel="noopener"
               class="ml-2 text-sm font-semibold text-white bg-pink-500 hover:bg-pink-600
                      px-5 py-2.5 rounded-full transition-all shadow-sm">
                Reservasi
            </a>
        </div>

        <!-- Tombol Kembali sederhana untuk mobile -->
        <a href="{{ route('home') }}"
           class="md:hidden flex items-center gap-1.5 text-sm font-medium text-pink-600
                  hover:text-pink-800 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>
</nav>

<!-- Main Content
     pt-28 di mobile agar tidak tertimpa navbar fixed,
     md:pt-24 kembali ke normal di layar lebih besar
-->
<main class="pt-28 md:pt-24 pb-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-12">

        <!-- Breadcrumb -->
        <nav class="animate-in delay-1 flex items-center flex-wrap text-sm text-gray-400 mb-8 mt-4">
            <a href="{{ route('home') }}" class="hover:text-pink-500 transition-colors font-medium">
                Beranda
            </a>
            <span class="breadcrumb-sep">
                <a href="{{ route('home') }}#katalog-produk"
                   class="hover:text-pink-500 transition-colors font-medium">
                    Produk Kecantikan
                </a>
            </span>
            <span class="breadcrumb-sep text-pink-500 font-semibold">
                {{ $product->name }}
            </span>
        </nav>

        <!-- Grid 2 Kolom
             Di mobile: kolom tunggal (stack vertikal, gambar di atas info)
             Di lg ke atas: 2 kolom berdampingan
        -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            <!-- Gambar Produk -->
            <div class="animate-in delay-2">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-pink-100
                            border border-pink-100 aspect-square bg-pink-50">
                    @if($product->image_path)
<img src="{{ Storage::disk('s3')->url($product->image_path) }}"
     alt="{{ $product->name }}"
     class="hero-img w-full h-full object-cover" />
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center
                                    bg-gradient-to-br from-pink-50 via-rose-50 to-pink-100">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-24 h-24 text-pink-200 mb-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="0.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="text-pink-300 text-sm font-medium">Foto segera hadir</p>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-pink-500 text-white text-xs
                                font-semibold px-3 py-1.5 rounded-full shadow-md">
                        ✦ Produk Kecantikan
                    </div>
                </div>

                <!-- Thumbnail slot -->
                <div class="flex gap-3 mt-4">
                    @if($product->image_path)
                        <div class="w-20 h-20 rounded-xl overflow-hidden border-2 border-pink-400 shadow-sm">
                            <img src="{{ Storage::disk('s3')->url($product->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover" />
                        </div>
                    @endif
                    <div class="w-20 h-20 rounded-xl bg-pink-50 border border-dashed border-pink-200
                                flex items-center justify-center text-pink-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Info Produk -->
            <div class="space-y-6">

                <div class="animate-in delay-2">
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-pink-600
                                 bg-pink-50 border border-pink-200 px-3 py-1.5 rounded-full
                                 tracking-widest uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-pink-400"></span>
                        Produk Kecantikan
                    </span>
                </div>

                <h1 class="animate-in delay-3 text-3xl lg:text-4xl xl:text-5xl font-bold
                           text-gray-900 leading-tight">
                    {{ $product->name }}
                </h1>

                <div class="animate-in delay-3 flex items-baseline gap-3">
                    <span class="text-4xl font-bold text-pink-500"
                          style="font-family: var(--font-display);">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-sm text-gray-400 font-light">/ pcs</span>
                </div>

                <div class="animate-in delay-3 flex items-center gap-3">
                    <div class="h-px flex-1 bg-gradient-to-r from-pink-200 to-transparent"></div>
                    <span class="text-pink-300 text-xs">✦</span>
                    <div class="h-px flex-1 bg-gradient-to-l from-pink-200 to-transparent"></div>
                </div>

                <div class="animate-in delay-4">
                    <h3 class="text-base font-semibold text-gray-700 mb-3">Deskripsi Produk</h3>
                    <div class="text-gray-500 text-sm font-light leading-7 space-y-3">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <!-- Keunggulan Produk
                     Di mobile: 1 kolom vertikal (grid-cols-1)
                     Di sm ke atas: 2 kolom (sm:grid-cols-2)
                -->
                <div class="animate-in delay-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="flex items-center gap-2.5 bg-pink-50 rounded-xl px-4 py-3 border border-pink-100">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm border border-pink-100 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-500"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-600">BPOM Terdaftar</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-pink-50 rounded-xl px-4 py-3 border border-pink-100">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm border border-pink-100 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-500"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-600">Cruelty Free</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-pink-50 rounded-xl px-4 py-3 border border-pink-100">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm border border-pink-100 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-500"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-600">Original Bergaransi</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-pink-50 rounded-xl px-4 py-3 border border-pink-100">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm border border-pink-100 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-500"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-600">Bisa COD & Transfer</span>
                    </div>
                </div>

                <!-- ★ TOMBOL WHATSAPP UTAMA ★
                     PERBAIKAN: Hapus "hidden md:flex", ganti jadi "flex" agar tampil di semua ukuran.
                     Di mobile: w-full + justify-center = tombol penuh lebar & teks di tengah.
                     mt-4 memberi jarak dari konten di atasnya.
                -->
                <div class="animate-in delay-5 space-y-3 pt-2">
                    <a href="https://wa.me/6285862499133?text=Halo%20admin%20Nia%20Salon%2C%20saya%20ingin%20bertanya%20tentang%20produk%3A%20*{{ urlencode($product->name) }}*%20seharga%20Rp%20{{ number_format($product->price, 0, ',', '.') }}.%20Apakah%20stok%20masih%20tersedia%3F%20%F0%9F%98%8A"
                       target="_blank" rel="noopener"
                       class="wa-pulse mt-4 w-full flex items-center justify-center gap-3 bg-green-500
                              hover:bg-green-600 text-white font-semibold text-base px-8 py-4
                              rounded-2xl transition-all shadow-lg hover:shadow-xl
                              hover:shadow-green-200 hover:-translate-y-0.5 active:translate-y-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0"
                             viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.555 4.122 1.528 5.855L.057 23.882a.5.5 0 00.609.61l6.102-1.459A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.882a9.86 9.86 0 01-5.034-1.376l-.36-.214-3.733.893.922-3.65-.234-.375A9.862 9.862 0 012.118 12C2.118 6.533 6.533 2.118 12 2.118S21.882 6.533 21.882 12 17.467 21.882 12 21.882z"/>
                        </svg>
                        Tanya Info via WhatsApp
                    </a>

                    <a href="{{ route('home') }}#katalog-produk"
                       class="w-full flex items-center justify-center gap-2 text-sm font-medium
                              text-gray-500 hover:text-pink-600 bg-gray-50 hover:bg-pink-50
                              border border-gray-200 hover:border-pink-200 px-8 py-3.5
                              rounded-2xl transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Layanan dan Produk
                    </a>
                </div>

            </div>
        </div>

        <!-- Produk Terkait -->
        @if($related->isNotEmpty())
            <div class="mt-24">
                <div class="flex items-center gap-4 mb-10">
                    <div class="h-px flex-1 bg-pink-100"></div>
                    <div class="text-center">
                        <p class="text-xs font-semibold text-pink-400 tracking-widest uppercase mb-1">
                            Pilihan Lainnya
                        </p>
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-800">
                            Produk <span class="italic text-pink-500">Terkait</span>
                        </h2>
                    </div>
                    <div class="h-px flex-1 bg-pink-100"></div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @foreach($related as $item)
                        <a href="{{ route('product.show', $item->id) }}"
                           class="related-card bg-white rounded-2xl overflow-hidden border
                                  border-pink-50 block no-underline group shadow-sm">
                            <div class="relative aspect-square bg-pink-50 overflow-hidden">
                                @if($item->image_path)
<img src="{{ Storage::disk('s3')->url($item->image_path) }}"
     alt="{{ $item->name }}"
     class="w-full h-full object-cover" />
                                @else
                                    <div class="w-full h-full flex items-center justify-center
                                                bg-gradient-to-br from-pink-50 to-rose-100">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-10 h-10 text-pink-200" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-sm font-semibold text-gray-800 group-hover:text-pink-600
                                           transition-colors mb-1 line-clamp-2">
                                    {{ $item->name }}
                                </h3>
                                <p class="text-sm font-bold text-pink-500">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</main>

<!-- Footer Mini -->
<footer style="background-color: #fce7f3;" class="border-t border-pink-200">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-8 flex flex-col sm:flex-row
                items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-full bg-pink-500 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                    <line x1="9" y1="9" x2="9.01" y2="9"/>
                    <line x1="15" y1="9" x2="15.01" y2="9"/>
                </svg>
            </div>
            <span style="font-family: var(--font-display);" class="font-bold text-gray-700">
                Nia Salon
            </span>
        </div>
        <p class="text-xs text-gray-400 text-center">
            © {{ date('Y') }} Nia Salon — Semua hak cipta dilindungi.
        </p>
        <a href="{{ route('home') }}"
           class="text-xs text-pink-500 hover:text-pink-700 font-medium transition-colors">
            ← Kembali ke Beranda
        </a>
    </div>
</footer>

<script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    }, { passive: true });
</script>

</body>
</html>