<x-app-layout>

    {{-- ======================================================
         SLOT: HEADER HALAMAN
    ====================================================== --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">

            {{-- Judul + Breadcrumb --}}
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400 mb-1">
                    <a href="{{ route('admin.services.index') }}"
                       class="hover:text-pink-500 transition-colors duration-200">
                        Kelola Layanan
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-300"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-pink-500 font-semibold">Edit Layanan</span>
                </div>
                <h2 class="text-xl font-bold text-gray-800 leading-tight"
                    style="font-family: 'Playfair Display', serif;">
                    Edit Layanan
                </h2>
            </div>

            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.services.index') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-gray-500
                      hover:text-pink-600 border border-gray-200 hover:border-pink-300
                      bg-white hover:bg-pink-50 px-4 py-2 rounded-full
                      transition-all duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar
            </a>

        </div>
    </x-slot>


    {{-- ======================================================
         GOOGLE FONTS
    ====================================================== --}}
    @push('styles')
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=DM+Sans:wght@300;400;500;600&display=swap"
              rel="stylesheet" />
    @endpush


    {{-- ======================================================
         MAIN BODY
    ====================================================== --}}
    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ── VALIDATION ERROR SUMMARY ── --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-5 flex gap-4 items-start">
                    <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-red-700 mb-2">
                            Terdapat {{ $errors->count() }} kesalahan pada form:
                        </p>
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-600 flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-400 shrink-0"></span>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- ── SUCCESS FLASH ── --}}
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-2xl p-4 flex gap-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500 shrink-0" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm font-medium text-green-700">{{ session('success') }}</p>
                </div>
            @endif


            {{-- ══════════════════════════════════════════
                 FORM — PUT ke admin.services.update
            ══════════════════════════════════════════ --}}
            <form action="{{ route('admin.services.update', $service) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="editServiceForm"
                  novalidate>

                @csrf
                @method('PUT')

                {{-- ── GRID LAYOUT: Kiri (2/3) | Kanan (1/3) ── --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                    {{-- ╔═══════════════════════════════╗
                         ║ KOLOM KIRI — Field Teks (2/3) ║
                         ╚═══════════════════════════════╝ --}}
                    <div class="lg:col-span-2 flex flex-col gap-6">


                        {{-- ┌─────────────────────────────┐
                             │  CARD 1: Informasi Layanan  │
                             └─────────────────────────────┘ --}}
                        <div class="bg-white rounded-2xl border border-pink-100 overflow-hidden
                                    shadow-sm hover:shadow-md hover:shadow-pink-50 transition-shadow duration-300">

                            {{-- Card Header --}}
                            <div class="flex items-center gap-3 px-6 py-4 border-b border-pink-50
                                        bg-gradient-to-r from-white to-pink-50/40">
                                <div class="w-9 h-9 rounded-xl bg-pink-100 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-500"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2
                                                 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Informasi Layanan</p>
                                    <p class="text-xs text-gray-400">Nama, deskripsi, dan harga layanan salon</p>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-6 space-y-6">

                                {{-- ── Field: Nama Jasa ── --}}
                                <div>
                                    <label for="title"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nama Jasa
                                        <span class="text-pink-500 ml-0.5">*</span>
                                    </label>

                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-4 h-4 text-pink-300" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0
                                                         010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0
                                                         013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $service->title) }}"
                                               placeholder="Contoh: Hair Coloring Premium, Keratin Treatment..."
                                               maxlength="255"
                                               autocomplete="off"
                                               class="w-full pl-10 pr-4 py-3 text-sm text-gray-800
                                                      border rounded-xl transition-all duration-200
                                                      placeholder-gray-300 bg-white
                                                      focus:outline-none focus:ring-2 focus:ring-pink-300
                                                      focus:border-pink-400
                                                      @error('title')
                                                          border-red-300 bg-red-50 focus:ring-red-200 focus:border-red-400
                                                      @else
                                                          border-pink-100 hover:border-pink-200
                                                      @enderror" />
                                    </div>

                                    <div class="flex items-start justify-between mt-1.5">
                                        <div>
                                            @error('title')
                                                <p class="flex items-center gap-1.5 text-xs text-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @else
                                                <p class="text-xs text-gray-400">Tulis nama layanan yang jelas dan mudah dipahami</p>
                                            @enderror
                                        </div>
                                        <span id="titleCounter" class="text-xs text-gray-300 shrink-0 ml-3">
                                            {{ strlen(old('title', $service->title)) }} / 255
                                        </span>
                                    </div>
                                </div>
                                {{-- Akhir Nama Jasa --}}


                                {{-- ── Field: Harga ── --}}
                                <div>
                                    <label for="price"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Harga
                                        <span class="text-pink-500 ml-0.5">*</span>
                                    </label>

                                    <div class="flex rounded-xl overflow-hidden transition-all duration-200
                                                @error('price')
                                                    ring-2 ring-red-200 border border-red-300
                                                @else
                                                    border border-pink-100 hover:border-pink-200
                                                    focus-within:ring-2 focus-within:ring-pink-300
                                                    focus-within:border-pink-400
                                                @enderror">
                                        <span class="inline-flex items-center px-4 bg-pink-50 border-r
                                                     border-pink-100 text-pink-600 text-sm font-bold
                                                     shrink-0 select-none">
                                            Rp
                                        </span>
                                        <input type="number"
                                               id="price"
                                               name="price"
                                               value="{{ old('price', $service->price) }}"
                                               placeholder="250000"
                                               min="0"
                                               step="500"
                                               class="flex-1 px-4 py-3 text-sm text-gray-800 bg-white
                                                      border-0 outline-none placeholder-gray-300
                                                      @error('price') bg-red-50 @enderror" />
                                    </div>

                                    <div class="mt-1.5">
                                        @error('price')
                                            <p class="flex items-center gap-1.5 text-xs text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @else
                                            <p id="priceFormatted" class="text-xs text-gray-400">
                                                @if(old('price', $service->price))
                                                    <span class="text-green-600 font-medium">
                                                        = Rp {{ number_format(old('price', $service->price), 0, ',', '.') }}
                                                    </span>
                                                @else
                                                    Masukkan harga dalam satuan Rupiah (tanpa titik/koma)
                                                @endif
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Akhir Harga --}}


                                {{-- ── Field: Kategori ── --}}
                                <div>
                                    <label for="category"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Kategori
                                        <span class="text-pink-500 ml-0.5">*</span>
                                    </label>

                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-300"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0
                                                         010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0
                                                         013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                        <select id="category"
                                                name="category"
                                                class="w-full pl-10 pr-10 py-3 text-sm text-gray-800
                                                       border rounded-xl bg-white appearance-none
                                                       transition-all duration-200 cursor-pointer
                                                       focus:outline-none focus:ring-2 focus:ring-pink-300
                                                       focus:border-pink-400
                                                       @error('category')
                                                           border-red-300 bg-red-50
                                                       @else
                                                           border-pink-100 hover:border-pink-200
                                                       @enderror">
                                            <option value="" disabled
                                                    {{ old('category', $service->category) === null ? 'selected' : '' }}>
                                                — Pilih Kategori —
                                            </option>
                                            <option value="service"
                                                    {{ old('category', $service->category) === 'service' ? 'selected' : '' }}>
                                                ✂️ Katalog Layanan Jasa Salon
                                            </option>
                                            <option value="product"
                                                    {{ old('category', $service->category) === 'product' ? 'selected' : '' }}>
                                                🛍️ Koleksi Produk Kecantikan
                                            </option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </div>

                                    @error('category')
                                        <p class="flex items-center gap-1.5 text-xs text-red-500 mt-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @else
                                        <p class="text-xs text-gray-400 mt-1.5">
                                            Pilih apakah ini layanan jasa salon atau produk kecantikan
                                        </p>
                                    @enderror
                                </div>
                                {{-- Akhir Kategori --}}


                                {{-- ── Field: Deskripsi ── --}}
                                <div>
                                    <label for="description"
                                           class="block text-sm font-semibold text-gray-700 mb-2">
                                        Deskripsi
                                        <span class="text-pink-500 ml-0.5">*</span>
                                    </label>

                                    <textarea id="description"
                                              name="description"
                                              rows="6"
                                              placeholder="Jelaskan detail layanan ini: manfaat, proses perawatan, berapa lama, produk yang digunakan..."
                                              class="w-full px-4 py-3 text-sm text-gray-800
                                                     border rounded-xl resize-y
                                                     placeholder-gray-300 bg-white
                                                     transition-all duration-200
                                                     focus:outline-none focus:ring-2
                                                     focus:ring-pink-300 focus:border-pink-400
                                                     @error('description')
                                                         border-red-300 bg-red-50
                                                         focus:ring-red-200 focus:border-red-400
                                                     @else
                                                         border-pink-100 hover:border-pink-200
                                                     @enderror"
                                              style="min-height: 140px;">{{ old('description', $service->description) }}</textarea>

                                    <div class="flex items-start justify-between mt-1.5">
                                        <div>
                                            @error('description')
                                                <p class="flex items-center gap-1.5 text-xs text-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @else
                                                <p class="text-xs text-gray-400">
                                                    Deskripsi yang detail meningkatkan kepercayaan pelanggan
                                                </p>
                                            @enderror
                                        </div>
                                        <span id="descCounter" class="text-xs text-gray-300 shrink-0 ml-3">
                                            {{ strlen(old('description', $service->description)) }} karakter
                                        </span>
                                    </div>
                                </div>
                                {{-- Akhir Deskripsi --}}

                            </div>
                            {{-- Akhir Card Body --}}

                        </div>
                        {{-- Akhir Card 1 --}}


                    </div>
                    {{-- Akhir Kolom Kiri --}}


                    {{-- ╔═══════════════════════════════════╗
                         ║ KOLOM KANAN — Foto + Aksi (1/3)  ║
                         ╚═══════════════════════════════════╝ --}}
                    <div class="lg:col-span-1 flex flex-col gap-6">


                        {{-- ┌─────────────────────────────┐
                             │  CARD 2: Upload Foto        │
                             └─────────────────────────────┘ --}}
                        <div class="bg-white rounded-2xl border border-pink-100 overflow-hidden
                                    shadow-sm hover:shadow-md hover:shadow-pink-50 transition-shadow duration-300">

                            <div class="flex items-center gap-3 px-5 py-4 border-b border-pink-50
                                        bg-gradient-to-r from-white to-pink-50/40">
                                <div class="w-9 h-9 rounded-xl bg-pink-100 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-500"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2
                                                 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0
                                                 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Foto Layanan</p>
                                    <p class="text-xs text-gray-400">JPG, PNG, WebP — maks. 2 MB</p>
                                </div>
                            </div>

                            <div class="p-5 space-y-4">

                                {{-- ── FOTO SAAT INI (jika ada) ── --}}
                                @if ($service->image)
                                    <div id="currentImageWrapper"
                                         class="relative rounded-xl overflow-hidden border-2 border-pink-200">
                                        <img src="{{ asset('storage/' . $service->image) }}"
                                             alt="Foto saat ini"
                                             class="w-full h-48 object-cover block" />
                                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t
                                                    from-black/60 to-transparent px-4 py-2">
                                            <p class="text-white text-xs font-semibold">Foto saat ini</p>
                                        </div>
                                    </div>
                                @endif

                                {{-- ── AREA PREVIEW baru (muncul setelah foto baru dipilih) --}}
                                <div id="previewWrapper"
                                     class="{{ $service->image ? 'hidden' : 'hidden' }} relative rounded-xl overflow-hidden border-2 border-pink-200 bg-pink-50">
                                    <img id="imagePreview"
                                         src=""
                                         alt="Preview foto layanan"
                                         class="w-full h-48 object-cover block" />
                                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t
                                                from-black/60 to-transparent px-4 py-3
                                                flex items-end justify-between">
                                        <div>
                                            <p id="previewFileName"
                                               class="text-white text-xs font-semibold truncate max-w-[140px]"></p>
                                            <p id="previewFileSize" class="text-white/70 text-xs"></p>
                                        </div>
                                        <button type="button"
                                                onclick="removePhoto()"
                                                title="Hapus foto"
                                                class="w-7 h-7 rounded-full bg-white/20 backdrop-blur-sm
                                                       hover:bg-red-500 text-white flex items-center
                                                       justify-center transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                {{-- ── DROPZONE ── --}}
                                <label id="dropzone"
                                       for="image"
                                       class="flex flex-col items-center justify-center gap-3
                                              w-full h-40 rounded-xl cursor-pointer
                                              border-2 border-dashed border-pink-200
                                              bg-pink-50/60 hover:bg-pink-50
                                              hover:border-pink-400
                                              transition-all duration-200 group
                                              @error('image') border-red-300 bg-red-50 @enderror">

                                    <div class="w-11 h-11 rounded-2xl bg-white border border-pink-200
                                                flex items-center justify-center shadow-sm
                                                group-hover:shadow-md group-hover:border-pink-300
                                                transition-all duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5 text-pink-400 group-hover:text-pink-500
                                                    transition-colors duration-200"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011
                                                     9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                    </div>

                                    <div class="text-center px-4">
                                        <p class="text-sm font-semibold text-gray-600
                                                  group-hover:text-pink-600 transition-colors duration-200">
                                            {{ $service->image ? 'Ganti foto' : 'Klik untuk pilih foto' }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-0.5">atau drag &amp; drop di sini</p>
                                    </div>

                                    <input type="file"
                                           id="image"
                                           name="image"
                                           accept="image/jpeg,image/png,image/jpg,image/webp"
                                           class="hidden" />
                                </label>

                                @error('image')
                                    <p class="flex items-center gap-1.5 text-xs text-red-500 -mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror

                                {{-- Tips Foto --}}
                                <div class="flex gap-2.5 bg-amber-50 border border-amber-100 rounded-xl p-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828
                                                 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356
                                                 -1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                    <p class="text-xs text-amber-700 leading-relaxed">
                                        <strong class="font-semibold">Tips:</strong> Kosongkan jika tidak ingin
                                        mengganti foto. Foto baru akan menggantikan foto lama.
                                    </p>
                                </div>

                            </div>
                        </div>
                        {{-- Akhir Card Foto --}}


                        {{-- ┌─────────────────────────────┐
                             │  CARD 3: Aksi — Simpan      │
                             └─────────────────────────────┘ --}}
                        <div class="bg-white rounded-2xl border border-pink-100 shadow-sm overflow-visible">
                            <div class="p-5 space-y-3">

                                {{-- Status --}}
                                <div class="flex items-center gap-3 p-3.5 bg-blue-50
                                            border border-blue-100 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-400 shrink-0"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2
                                                 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    <div>
                                        <p class="text-xs font-semibold text-blue-700">Mode Edit</p>
                                        <p class="text-xs text-blue-500 font-light">Perubahan langsung diterapkan</p>
                                    </div>
                                </div>

                                {{-- Tombol Simpan --}}
                                <button type="submit"
                                        id="submitBtn"
                                        class="w-full inline-flex items-center justify-center gap-2.5
                                               font-semibold text-sm text-white
                                               px-6 py-3.5 rounded-xl
                                               transition-all duration-200
                                               shadow-md shadow-pink-200
                                               hover:shadow-lg hover:shadow-pink-200
                                               hover:-translate-y-0.5 active:translate-y-0
                                               focus:outline-none focus:ring-2
                                               focus:ring-pink-400 focus:ring-offset-2"
                                        style="background: linear-gradient(135deg, #f472b6, #ec4899);">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0
                                                 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                    </svg>
                                    <span id="submitLabel">Simpan Perubahan</span>
                                </button>

                                {{-- Tombol Batal --}}
                                <a href="{{ route('admin.services.index') }}"
                                   class="w-full inline-flex items-center justify-center gap-2
                                          text-sm font-medium text-gray-500 hover:text-gray-700
                                          bg-gray-50 hover:bg-gray-100
                                          border border-gray-200 hover:border-gray-300
                                          px-6 py-3 rounded-xl
                                          transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Batal
                                </a>

                            </div>
                        </div>
                        {{-- Akhir Card Aksi --}}


                        {{-- ┌─────────────────────────────┐
                             │  CARD 4: Checklist          │
                             └─────────────────────────────┘ --}}
                        <div class="bg-white rounded-2xl border border-pink-100 overflow-hidden shadow-sm">
                            <div class="px-5 pt-4 pb-1 border-b border-pink-50">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest">
                                    Checklist Form
                                </p>
                            </div>
                            <ul class="p-5 space-y-3">

                                <li class="flex items-center gap-3" id="chk-title">
                                    <span id="chk-title-dot"
                                          class="w-5 h-5 rounded-full border-2 border-gray-200
                                                 flex items-center justify-center shrink-0
                                                 transition-all duration-300">
                                    </span>
                                    <span class="text-xs text-gray-500">Nama jasa diisi</span>
                                </li>

                                <li class="flex items-center gap-3" id="chk-price">
                                    <span id="chk-price-dot"
                                          class="w-5 h-5 rounded-full border-2 border-gray-200
                                                 flex items-center justify-center shrink-0
                                                 transition-all duration-300">
                                    </span>
                                    <span class="text-xs text-gray-500">Harga diisi</span>
                                </li>

                                <li class="flex items-center gap-3" id="chk-desc">
                                    <span id="chk-desc-dot"
                                          class="w-5 h-5 rounded-full border-2 border-gray-200
                                                 flex items-center justify-center shrink-0
                                                 transition-all duration-300">
                                    </span>
                                    <span class="text-xs text-gray-500">Deskripsi diisi</span>
                                </li>

                                <li class="flex items-center gap-3" id="chk-img">
                                    <span id="chk-img-dot"
                                          class="w-5 h-5 rounded-full border-2 border-gray-200
                                                 flex items-center justify-center shrink-0
                                                 transition-all duration-300">
                                    </span>
                                    <span class="text-xs text-gray-400">
                                        Foto baru diunggah
                                        <span class="text-gray-300">(opsional)</span>
                                    </span>
                                </li>

                            </ul>
                        </div>
                        {{-- Akhir Card Checklist --}}


                    </div>
                    {{-- Akhir Kolom Kanan --}}


                </div>
                {{-- Akhir Grid --}}

            </form>
            {{-- Akhir Form --}}

        </div>
    </div>
    {{-- Akhir .py-8 --}}


    {{-- ══════════════════════════════════════════════════════
         JAVASCRIPT — Preview, Checklist, Submit State
    ══════════════════════════════════════════════════════ --}}
    @push('scripts')
    <script>
    (function () {
        'use strict';

        /* ── Referensi DOM ── */
        const titleInput   = document.getElementById('title');
        const priceInput   = document.getElementById('price');
        const descInput    = document.getElementById('description');
        const imageInput   = document.getElementById('image');

        const titleCounter    = document.getElementById('titleCounter');
        const descCounter     = document.getElementById('descCounter');
        const priceFormatted  = document.getElementById('priceFormatted');

        const dropzone        = document.getElementById('dropzone');
        const previewWrapper  = document.getElementById('previewWrapper');
        const imagePreview    = document.getElementById('imagePreview');
        const previewFileName = document.getElementById('previewFileName');
        const previewFileSize = document.getElementById('previewFileSize');
        const currentImageWrapper = document.getElementById('currentImageWrapper');

        const submitBtn       = document.getElementById('submitBtn');


        /* ── 1. Counter Karakter: Judul ── */
        titleInput.addEventListener('input', function () {
            const len = this.value.length;
            titleCounter.textContent = len + ' / 255';
            titleCounter.style.color = len > 200 ? '#f43f5e' : '';
            tick('title', this.value.trim().length > 0);
        });


        /* ── 2. Format Harga Realtime ── */
        priceInput.addEventListener('input', function () {
            const val = parseFloat(this.value);
            if (priceFormatted) {
                if (this.value !== '' && !isNaN(val) && val >= 0) {
                    priceFormatted.textContent = '= Rp\u00a0' + val.toLocaleString('id-ID');
                    priceFormatted.style.color = '#16a34a';
                    tick('price', true);
                } else {
                    priceFormatted.textContent = 'Masukkan harga dalam satuan Rupiah (tanpa titik/koma)';
                    priceFormatted.style.color = '';
                    tick('price', false);
                }
            } else {
                tick('price', this.value !== '' && !isNaN(val) && val >= 0);
            }
        });


        /* ── 3. Counter Karakter: Deskripsi ── */
        descInput.addEventListener('input', function () {
            const len = this.value.length;
            descCounter.textContent = len.toLocaleString('id-ID') + ' karakter';
            tick('desc', this.value.trim().length > 0);
        });


        /* ── 4. Upload & Preview Foto ── */
        imageInput.addEventListener('change', function () {
            handleFile(this.files[0]);
        });

        function handleFile(file) {
            if (!file) return;

            const allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            if (!allowed.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG, PNG, atau WebP.');
                imageInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2 MB.');
                imageInput.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src        = e.target.result;
                previewFileName.textContent = file.name;
                previewFileSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';

                previewWrapper.classList.remove('hidden');
                dropzone.classList.add('hidden');

                /* Sembunyikan foto lama jika ada */
                if (currentImageWrapper) {
                    currentImageWrapper.classList.add('hidden');
                }

                tick('img', true);
            };
            reader.readAsDataURL(file);
        }

        /* Hapus foto baru yang sudah dipilih */
        window.removePhoto = function () {
            imageInput.value = '';
            imagePreview.src = '';
            previewWrapper.classList.add('hidden');
            dropzone.classList.remove('hidden');

            /* Tampilkan lagi foto lama jika ada */
            if (currentImageWrapper) {
                currentImageWrapper.classList.remove('hidden');
            }

            tick('img', false);
        };

        /* Drag & Drop */
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('border-pink-500', 'bg-pink-100');
        });
        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('border-pink-500', 'bg-pink-100');
        });
        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('border-pink-500', 'bg-pink-100');
            const file = e.dataTransfer.files[0];
            if (file) {
                const dt = new DataTransfer();
                dt.items.add(file);
                imageInput.files = dt.files;
                handleFile(file);
            }
        });


        /* ── 5. Checklist Realtime ── */
        const CHECK_SVG = `<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3"
                                fill="none" viewBox="0 0 24 24"
                                stroke="white" stroke-width="3">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                           </svg>`;

        function tick(key, done) {
            const dot = document.getElementById('chk-' + key + '-dot');
            if (!dot) return;
            if (done) {
                dot.style.background  = '#ec4899';
                dot.style.borderColor = '#ec4899';
                dot.innerHTML         = CHECK_SVG;
            } else {
                dot.style.background  = '';
                dot.style.borderColor = '';
                dot.innerHTML         = '';
            }
        }


        /* ── 6. Loading State Saat Submit ── */
        document.getElementById('editServiceForm')
            .addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.75';
                submitBtn.innerHTML = `
                    <svg class="animate-spin w-4 h-4 shrink-0"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962
                                 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span>Menyimpan...</span>`;
            });


        /* ── 7. Inisiasi Awal (baca nilai existing dari $service) ── */
        (function init() {
            if (titleInput.value) {
                titleCounter.textContent = titleInput.value.length + ' / 255';
                tick('title', titleInput.value.trim().length > 0);
            }
            if (priceInput.value !== '') {
                const val = parseFloat(priceInput.value);
                if (!isNaN(val)) tick('price', true);
            }
            if (descInput.value) {
                descCounter.textContent =
                    descInput.value.length.toLocaleString('id-ID') + ' karakter';
                tick('desc', descInput.value.trim().length > 0);
            }
        })();

    })();
    </script>
    @endpush

</x-app-layout>