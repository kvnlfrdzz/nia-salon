<x-app-layout>
    <x-slot name="header">
        {{-- ── HEADER: Dashboard Admin Nia Salon ──────────────────────── --}}
        {{--
            PERBAIKAN MASALAH 2:
            - Elemen bintang SVG (path M11.049 2.927...) dan kotak pink (#fce7f3/#fbcfe8)
              yang sebelumnya ada di Welcome Card TELAH DIHAPUS.
            - Header diganti menjadi judul minimalis & anggun dengan Playfair Display.
        --}}
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400 mb-1">
                    <span class="text-pink-500 font-medium">Dashboard</span>
                </div>
                {{-- BARU: Judul minimalis "Dashboard Admin Nia Salon" --}}
                <h2 class="text-2xl font-bold text-gray-800 leading-tight"
                    style="font-family: 'Playfair Display', serif;">
                    Dashboard Admin Nia Salon
                </h2>
                <p class="text-sm text-gray-400 mt-0.5">Ringkasan konten &amp; aktivitas admin salon</p>
            </div>

            {{-- Tanggal --}}
            <div class="hidden sm:flex items-center gap-2 text-sm text-gray-400
                        bg-white border border-pink-100 rounded-2xl px-4 py-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-400" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0
                             002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium text-gray-600">{{ now()->translatedFormat('d F Y') }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- ── STAT CARDS ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                {{-- Card: Total Katalog Jasa --}}
                {{-- PERBAIKAN MASALAH 3: angka dummy "12" diganti {{ $totalJasa }} --}}
                <div class="bg-white rounded-3xl shadow-sm border border-pink-50 p-6 flex items-center gap-4
                            hover:shadow-md hover:shadow-pink-50 transition-shadow duration-300">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg, #f472b6, #ec4899);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0
                                     00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-pink-400 uppercase tracking-wider">
                            Total Katalog Jasa
                        </p>
                        <p class="text-3xl font-bold text-gray-800 mt-0.5">
                            {{ $totalJasa }} <span class="text-base font-medium text-gray-400">jasa</span>
                        </p>
                    </div>
                </div>

                {{-- Card: Total Produk Showcase --}}
                {{-- PERBAIKAN MASALAH 3: angka dummy "25" diganti {{ $totalProduk }} --}}
                <div class="bg-white rounded-3xl shadow-sm border border-pink-50 p-6 flex items-center gap-4
                            hover:shadow-md hover:shadow-orange-50 transition-shadow duration-300">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg, #fb923c, #f97316);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-orange-400 uppercase tracking-wider">
                            Total Produk Showcase
                        </p>
                        <p class="text-3xl font-bold text-gray-800 mt-0.5">
                            {{ $totalProduk }} <span class="text-base font-medium text-gray-400">produk</span>
                        </p>
                    </div>
                </div>

                {{-- Card: Status Sistem --}}
                {{-- PERBAIKAN MASALAH 3: status dinamis berdasarkan environment --}}
                <div class="bg-white rounded-3xl shadow-sm border border-pink-50 p-6 flex items-center gap-4
                            hover:shadow-md hover:shadow-emerald-50 transition-shadow duration-300">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg, #34d399, #10b981);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-emerald-400 uppercase tracking-wider">
                            Status Sistem
                        </p>
                        @if (app()->environment('local'))
                            {{-- Badge hijau untuk environment local/development --}}
                            <span class="inline-flex items-center gap-1.5 mt-1 px-2.5 py-1
                                         rounded-full text-xs font-semibold
                                         bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse
                                             inline-block"></span>
                                Aktif (Production)
                            </span>
                        @elseif (app()->environment('staging'))
                            <span class="inline-flex items-center gap-1.5 mt-1 px-2.5 py-1
                                         rounded-full text-xs font-semibold
                                         bg-yellow-50 text-yellow-700 border border-yellow-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse
                                             inline-block"></span>
                                Aktif (Staging)
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 mt-1 px-2.5 py-1
                                         rounded-full text-xs font-semibold
                                         bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse
                                             inline-block"></span>
                                Aktif &amp; Normal
                            </span>
                        @endif
                    </div>
                </div>

            </div>
            {{-- Akhir Stat Cards --}}


            {{-- ── WELCOME CARD ── --}}
            {{--
                PERBAIKAN MASALAH 2:
                Elemen dekoratif bintang yang lama (div w-16 h-16 dengan background #fce7f3/#fbcfe8
                dan SVG star path M11.049 2.927...) TELAH DIHAPUS dari sini.
                Welcome Card sekarang bersih dan rata kiri tanpa elemen visual yang mengganggu.
            --}}
            <div class="bg-white rounded-3xl shadow-sm border border-pink-50 overflow-hidden">

                {{-- Dekoratif header strip --}}
                <div class="h-1.5 w-full"
                     style="background: linear-gradient(90deg, #f9a8d4, #ec4899, #f9a8d4);"></div>

                <div class="p-6 sm:p-8">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-2"
                            style="font-family: 'Playfair Display', serif;">
                            Halo, Admin Cantik! 💄
                        </h3>
                        <p class="text-gray-500 text-sm leading-relaxed max-w-xl">
                            Selamat datang di panel admin
                            <span class="font-semibold text-pink-500">Nia Salon</span>.
                            Di sini kamu bisa ngatur semua konten yang tampil di website — mulai dari
                            katalog layanan, produk showcase, hingga pengaturan akun. Semangat berkarya! ✨
                        </p>
                    </div>

                    {{-- Quick Action Buttons --}}
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('admin.services.index') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm
                                  font-semibold text-white transition-all duration-200
                                  hover:opacity-90 hover:shadow-md hover:-translate-y-0.5"
                           style="background: linear-gradient(135deg, #f472b6, #ec4899);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0
                                         00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Kelola Layanan
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm
                                  font-semibold text-pink-600 bg-pink-50 border border-pink-100
                                  transition-all duration-200 hover:bg-pink-100 hover:border-pink-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Pengaturan Akun
                        </a>
                    </div>
                </div>
            </div>
            {{-- Akhir Welcome Card --}}


            {{-- ── INFO CEPAT ── --}}
            <div class="bg-white rounded-3xl shadow-sm border border-pink-50 p-6">
                <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-4 rounded-full bg-pink-400 inline-block"></span>
                    Info Cepat
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-600">

                    <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-pink-50/60">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400 flex-shrink-0"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005
                                     0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                        </svg>
                        <span>Login sebagai:
                            <strong class="text-gray-800">{{ auth()->user()->name }}</strong>
                        </span>
                    </div>

                    <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-pink-50/60">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-400 flex-shrink-0"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2
                                     2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Hari ini:
                            <strong class="text-gray-800">{{ now()->translatedFormat('d F Y') }}</strong>
                        </span>
                    </div>

                </div>
            </div>
            {{-- Akhir Info Cepat --}}

        </div>
    </div>
</x-app-layout>