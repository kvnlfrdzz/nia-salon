<x-guest-layout>

    {{--
        CATATAN DESAIN:
        Header branding internal yang sebelumnya ada di sini
        TELAH DIHAPUS karena logo kini ditangani oleh <x-application-logo>
        di dalam guest.blade.php (di atas card), menghindari duplikasi visual.

        Seluruh logic form Laravel Breeze (@csrf, method POST, validasi,
        name attribute, dsb.) TIDAK DIUBAH.
    --}}

    {{-- ── JUDUL FORM ────────────────────────────────────────── --}}
    <div class="mb-6">
        <div class="h-px bg-gradient-to-r from-transparent via-pink-200 to-transparent mb-6"></div>

        <h2 class="text-base font-bold text-gray-700"
            style="font-family: 'Playfair Display', serif;">
            Buat Akun Admin Baru
        </h2>
        <p class="text-xs text-gray-400 mt-0.5 font-medium">
            Isi data di bawah untuk mendaftar sebagai admin.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- ── Nama Lengkap ───────────────────────────────────── --}}
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name"
                          class="block mt-1 w-full rounded-xl border-pink-100
                                 focus:border-pink-400 focus:ring-pink-200"
                          type="text"
                          name="name"
                          :value="old('name')"
                          required
                          autofocus
                          autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- ── Email ─────────────────────────────────────────── --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full rounded-xl border-pink-100
                                 focus:border-pink-400 focus:ring-pink-200"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
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
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- ── Konfirmasi Password ─────────────────────────────── --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation"
                          class="block mt-1 w-full rounded-xl border-pink-100
                                 focus:border-pink-400 focus:ring-pink-200"
                          type="password"
                          name="password_confirmation"
                          required
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- ── Tombol Daftar ───────────────────────────────────── --}}
        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="px-6 py-2.5 rounded-xl text-sm font-semibold
                                     tracking-wide shadow-sm transition-all duration-200">
                {{ __('Daftar Sekarang') }}
            </x-primary-button>
        </div>
    </form>

    {{-- ── Divider + Link ke Login ──────────────────────────── --}}
    <div class="h-px bg-gradient-to-r from-transparent via-pink-100 to-transparent mt-7 mb-5"></div>

    <div class="text-center">
        <p class="text-sm text-gray-400">
            Sudah punya akun?
            <a href="{{ route('login') }}"
               class="font-semibold text-pink-500 hover:text-pink-600
                      transition-colors duration-200
                      underline underline-offset-2">
                Masuk di sini
            </a>
        </p>
    </div>

</x-guest-layout>