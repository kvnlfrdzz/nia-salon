<x-guest-layout>

    {{--
        CATATAN DESAIN:
        Header branding (logo icon + h1 "Nia Salon") yang sebelumnya
        ada di sini TELAH DIHAPUS karena sekarang sudah ditangani
        oleh komponen <x-application-logo> di dalam guest.blade.php
        (di atas card). Mempertahankan keduanya akan menyebabkan
        duplikasi logo yang merusak estetika.

        Logic form Laravel Breeze (@csrf, method, validasi, dsb.)
        TIDAK DIUBAH sama sekali.
    --}}

    {{-- ── JUDUL FORM ────────────────────────────────────────── --}}
    <div class="mb-6">
        {{-- Divider dekoratif di bagian atas --}}
        <div class="h-px bg-gradient-to-r from-transparent via-pink-200 to-transparent mb-6"></div>

        <h2 class="text-base font-bold text-gray-700"
            style="font-family: 'Playfair Display', serif;">
            Masuk ke Akun Anda
        </h2>
        <p class="text-xs text-gray-400 mt-0.5 font-medium">
            Selamat datang kembali! Masukkan kredensial Anda.
        </p>
    </div>

    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- ── Email ─────────────────────────────────────────── --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full rounded-xl border-pink-100
                                 focus:border-pink-400 focus:ring-pink-200"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- ── Password ───────────────────────────────────────── --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                          class="block mt-1 w-full rounded-xl border-pink-100
                                 focus:border-pink-400 focus:ring-pink-200"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- ── Remember Me ─────────────────────────────────────── --}}
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-pink-200 text-pink-500 shadow-sm
                              focus:ring-pink-300 focus:ring-offset-0"
                       name="remember">
                <span class="ms-2 text-sm text-gray-500 select-none">
                    {{ __('Ingat saya') }}
                </span>
            </label>
        </div>

        {{-- ── Actions: Lupa Password + Tombol Login ───────────── --}}
        <div class="flex items-center justify-between mt-6 gap-3">
            @if (Route::has('password.request'))
                <a class="text-xs text-gray-400 hover:text-pink-500
                           transition-colors duration-200
                           underline underline-offset-2
                           focus:outline-none focus:ring-2 focus:ring-pink-300 rounded"
                   href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            {{--
                Tombol submit: class btn-pink ditambahkan via JS di guest.blade.php
                sehingga warnanya auto-pink sesuai tema.
            --}}
            <x-primary-button class="px-6 py-2.5 rounded-xl text-sm font-semibold
                                     tracking-wide shadow-sm transition-all duration-200">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
</form>

    {{-- Link register di bawah ini sudah dihapus total demi keamanan Nia Salon --}}

</x-guest-layout>