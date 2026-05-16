<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--
            PERBAIKAN: Fallback title diganti dari 'MINDSTARS' → 'Nia Salon'
        --}}
        <title>{{ config('app.name', 'Nia Salon') }}</title>

        {{-- Google Fonts: Playfair Display (display/heading) + Plus Jakarta Sans (body) --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* ── Body Font ───────────────────────────────────────── */
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }

            /* ── Tombol Submit Pink ──────────────────────────────── */
            .btn-pink {
                background: linear-gradient(135deg, #f472b6, #ec4899) !important;
                border: none !important;
                transition: all 0.3s ease !important;
            }
            .btn-pink:hover {
                opacity: 0.90 !important;
                box-shadow: 0 8px 20px -4px rgba(236, 72, 153, 0.35) !important;
                transform: translateY(-1px) !important;
            }
            .btn-pink:active {
                transform: translateY(0) !important;
            }

            /* ── Input Focus Warna Pink ──────────────────────────── */
            input:focus {
                border-color: #f472b6 !important;
                --tw-ring-color: #fce7f3 !important;
            }

            /* ── Dekorasi background: titik-titik halus ─────────── */
            .bg-pattern {
                background-image: radial-gradient(circle, #fce7f3 1px, transparent 1px);
                background-size: 28px 28px;
            }
        </style>
    </head>

    <body class="text-gray-900 antialiased">

        {{-- Background utama: gradient lembut pastel dengan pola titik --}}
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center
                    pt-8 sm:pt-0
                    bg-gradient-to-br from-[#FFF5F7] via-[#fdf2f8] to-[#fefcff]">

            {{-- Layer pola titik dekoratif (overlay sangat transparan) --}}
            <div class="absolute inset-0 bg-pattern opacity-40 pointer-events-none"></div>

            {{-- ── LOGO NIA SALON DI ATAS CARD ─────────────────── --}}
            {{--
                PERBAIKAN MASALAH 1:
                Sebelumnya: teks "MINDSTARS" hardcoded di sini.
                Sekarang: menggunakan komponen <x-application-logo> yang sudah
                          diperbarui menjadi "Nia Salon" bergaya Playfair Display.
            --}}
            <div class="relative z-10 mb-8">
                <a href="/" class="group flex flex-col items-center
                                   transition-all duration-500
                                   hover:opacity-85">
                    <x-application-logo />
                </a>
            </div>

            {{-- ── CARD FORM ────────────────────────────────────── --}}
            <div class="relative z-10 w-full sm:max-w-md">
                {{--
                    Card: rounded-[2.5rem] = sudut halus mewah,
                    shadow multi-layer agar terasa mengambang,
                    border tipis pink ivory
                --}}
                <div class="bg-white/95 backdrop-blur-sm
                            shadow-[0_20px_60px_rgba(236,72,153,0.10),0_4px_16px_rgba(0,0,0,0.04)]
                            rounded-[2.5rem] border border-pink-50
                            px-8 py-10">
                    {{ $slot }}
                </div>
            </div>

            {{-- ── FOOTER ───────────────────────────────────────── --}}
            {{--
                PERBAIKAN MASALAH 3:
                Sebelumnya: "Mindstars Salon & Spa"
                Sekarang: "Nia Salon"
            --}}
            <div class="relative z-10 mt-8 mb-4 text-center space-y-1">
                <p class="text-pink-400 text-[10px] font-semibold uppercase tracking-[0.25em]">
                    &copy; {{ date('Y') }} Nia Salon — All Rights Reserved
                </p>
                <p class="text-pink-300 text-[10px] tracking-wider">
                    Kecantikan adalah investasi terbaik ✨
                </p>
            </div>

        </div>

        <script>
            // Auto-apply class btn-pink ke semua tombol submit di halaman guest
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('button[type="submit"]').forEach(function (btn) {
                    btn.classList.add('btn-pink');
                });
            });
        </script>

    </body>
</html>