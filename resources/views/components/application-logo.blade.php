{{--
    Komponen: application-logo.blade.php
    Deskripsi: Logo teks "Nia Salon" bergaya luxury serif menggantikan
               SVG hexagon bawaan Laravel Breeze.
    Digunakan di: guest.blade.php (via <x-application-logo>)
--}}
<div {{ $attributes->merge(['class' => 'flex flex-col items-center']) }}>

    {{-- Nama salon: "Nia" bold + "Salon" aksen pink --}}
    <span style="font-family: 'Playfair Display', serif; letter-spacing: 0.18em; line-height: 1;"
          class="text-4xl md:text-5xl font-bold text-gray-800 select-none">
        Nia <span class="text-pink-500">Salon</span>
    </span>

    {{-- Tagline dekoratif —diamond kecil di tengah garis— --}}
    <div class="flex items-center gap-2 mt-2.5">
        <div class="h-px w-10 bg-gradient-to-r from-transparent to-pink-300"></div>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2 text-pink-400 flex-shrink-0" viewBox="0 0 8 8" fill="currentColor">
            <path d="M4 0 L8 4 L4 8 L0 4 Z"/>
        </svg>
        <div class="h-px w-10 bg-gradient-to-l from-transparent to-pink-300"></div>
    </div>

    {{-- Subteks kecil --}}
    <p class="text-[10px] text-pink-400 font-semibold tracking-[0.35em] uppercase mt-1.5 select-none">
        Beauty &amp; Care
    </p>

</div>