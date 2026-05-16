<x-app-layout>

    {{-- ═══════════════════════════════════════════
         SLOT HEADER
    ═══════════════════════════════════════════ --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-pink-300" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1
                                 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <a href="{{ route('admin.dashboard') }}"
                       class="hover:text-pink-500 transition-colors duration-200">Dashboard</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-300"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-pink-500 font-semibold">Pengaturan Akun</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight"
                    style="font-family: 'Playfair Display', serif;">
                    Pengaturan Akun
                </h2>
                <p class="text-sm text-gray-400 mt-0.5">Kelola profil, password, dan keamanan akun Anda</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">


            {{-- ══════════════════════════════════════════
                 CARD 1 — Informasi Profil
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-3xl shadow-sm border border-pink-50 overflow-hidden
                        hover:shadow-md hover:shadow-pink-50 transition-shadow duration-300">

                {{-- Strip dekoratif atas --}}
                <div class="h-1 w-full"
                     style="background: linear-gradient(90deg, #f9a8d4, #ec4899, #f9a8d4);"></div>

                {{-- Card Header --}}
                <div class="flex items-center gap-3 px-6 py-5 border-b border-pink-50
                            bg-gradient-to-r from-white to-pink-50/30">
                    <div class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg, #fce7f3, #fbcfe8);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-500"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800"
                           style="font-family: 'Playfair Display', serif;">
                            Informasi Profil
                        </p>
                        <p class="text-xs text-pink-400">Perbarui nama dan alamat email akun Anda</p>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>


            {{-- ══════════════════════════════════════════
                 CARD 2 — Ubah Password
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-3xl shadow-sm border border-pink-50 overflow-hidden
                        hover:shadow-md hover:shadow-pink-50 transition-shadow duration-300">

                <div class="h-1 w-full"
                     style="background: linear-gradient(90deg, #a78bfa, #8b5cf6, #a78bfa);"></div>

                <div class="flex items-center gap-3 px-6 py-5 border-b border-pink-50
                            bg-gradient-to-r from-white to-violet-50/30">
                    <div class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg, #ede9fe, #ddd6fe);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-violet-500"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2
                                     2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800"
                           style="font-family: 'Playfair Display', serif;">
                            Ubah Password
                        </p>
                        <p class="text-xs text-violet-400">Pastikan akun Anda menggunakan password yang kuat</p>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>


            {{-- ══════════════════════════════════════════
                 CARD 3 — Hapus Akun
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-3xl shadow-sm border border-red-100 overflow-hidden
                        hover:shadow-md hover:shadow-red-50 transition-shadow duration-300">

                <div class="h-1 w-full"
                     style="background: linear-gradient(90deg, #fca5a5, #ef4444, #fca5a5);"></div>

                <div class="flex items-center gap-3 px-6 py-5 border-b border-red-50
                            bg-gradient-to-r from-white to-red-50/30">
                    <div class="w-10 h-10 rounded-2xl flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg, #fee2e2, #fecaca);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5
                                     7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-red-700"
                           style="font-family: 'Playfair Display', serif;">
                            Hapus Akun
                        </p>
                        <p class="text-xs text-red-400">Tindakan ini bersifat permanen dan tidak dapat dibatalkan</p>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>


        </div>
    </div>
</x-app-layout>