<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Layanan — Lumière Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=DM+Sans:wght@300;400;500;600&display=swap"
          rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --pink-50:   #fdf2f8;
            --pink-100:  #fce7f3;
            --pink-200:  #fbcfe8;
            --pink-400:  #f472b6;
            --pink-500:  #ec4899;
            --pink-600:  #db2777;
            --sidebar-w: 260px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #fafafa;
            min-height: 100vh;
        }

        /* ── Sidebar ────────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: #fff;
            border-right: 1px solid #fce7f3;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 40;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #1a1a1a;
            letter-spacing: -0.02em;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            color: #6b7280;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .nav-item:hover {
            background: var(--pink-50);
            color: var(--pink-600);
        }
        .nav-item.active {
            background: var(--pink-100);
            color: var(--pink-600);
            font-weight: 600;
        }
        .nav-item .nav-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            transition: background 0.2s ease;
            flex-shrink: 0;
        }
        .nav-item.active .nav-icon {
            background: var(--pink-500);
        }
        .nav-item.active .nav-icon svg {
            color: white;
        }

        /* ── Main Content ───────────────────────── */
        .main-content {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        /* ── Top Bar ────────────────────────────── */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #fce7f3;
            padding: 0 32px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        /* ── Mobile Overrides ───────────────────── */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .topbar {
                padding: 0 16px;
            }
        }

        /* ── Table ──────────────────────────────── */
        .table-wrap {
            background: #fff;
            border: 1px solid #fce7f3;
            border-radius: 20px;
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        thead tr {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%);
        }
        thead th {
            padding: 14px 20px;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #be185d;
            white-space: nowrap;
        }

        tbody tr {
            border-top: 1px solid #fdf2f8;
            transition: background 0.15s ease;
        }
        tbody tr:hover { background: #fdf9fb; }

        tbody td {
            padding: 16px 20px;
            font-size: 0.875rem;
            color: #374151;
            vertical-align: middle;
        }

        /* ── Badge Harga ────────────────────────── */
        .price-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #fdf2f8;
            color: var(--pink-600);
            font-weight: 600;
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 20px;
            border: 1px solid #fce7f3;
            white-space: nowrap;
        }

        /* ── Tombol Aksi ────────────────────────── */
        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            background: #fffbeb;
            color: #92400e;
            border: 1px solid #fde68a;
            transition: all 0.2s ease;
            text-decoration: none;
            white-space: nowrap;
        }
        .btn-edit:hover {
            background: #fbbf24;
            color: #fff;
            border-color: #fbbf24;
        }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
            transition: all 0.2s ease;
            cursor: pointer;
            white-space: nowrap;
        }
        .btn-delete:hover {
            background: #f43f5e;
            color: #fff;
            border-color: #f43f5e;
        }

        /* ── Thumbnail ──────────────────────────── */
        .thumb {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid #fce7f3;
        }
        .thumb-placeholder {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: linear-gradient(135deg, #fdf2f8, #fce7f3);
            border: 2px dashed #fbcfe8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ── Flash / Alert ──────────────────────── */
        .alert-success {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 14px;
            padding: 14px 18px;
            font-size: 0.875rem;
            font-weight: 500;
            animation: slideDown 0.4s ease;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Empty State ────────────────────────── */
        .empty-state {
            padding: 80px 20px;
            text-align: center;
        }

        /* ── Custom Scrollbar ───────────────────── */
        ::-webkit-scrollbar { width: 4px; height: 6px;}
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #fbcfe8; border-radius: 99px; }

        /* ── Modal Konfirmasi Hapus ─────────────── */
        #deleteModal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 60;
            background: rgba(0,0,0,0.35);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
        }
        #deleteModal.open { display: flex; }
        .modal-box {
            background: #fff;
            border-radius: 24px;
            padding: 36px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 25px 60px rgba(236,72,153,0.15);
            animation: modalPop 0.3s cubic-bezier(0.34,1.56,0.64,1);
        }
        @keyframes modalPop {
            from { opacity: 0; transform: scale(0.88); }
            to   { opacity: 1; transform: scale(1); }
        }

        /* ── Row animate in ─────────────────────── */
        tbody tr {
            animation: rowFade 0.3s ease both;
        }
        @keyframes rowFade {
            from { opacity: 0; transform: translateX(-6px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @php
            for ($i = 1; $i <= 10; $i++) {
                echo "tbody tr:nth-child($i) { animation-delay: " . ($i * 0.04) . "s; }";
            }
        @endphp
    </style>
</head>

<body>

{{-- Sidebar Overlay (Mobile) --}}
<div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-30 hidden backdrop-blur-sm transition-opacity opacity-0 pointer-events-none" onclick="toggleSidebar()"></div>

{{-- ╔══════════════════════════════════════════════╗
     ║  MODAL KONFIRMASI HAPUS                     ║
     ╚══════════════════════════════════════════════╝ --}}
<div id="deleteModal">
    <div class="modal-box">
        {{-- Ikon Warning --}}
        <div class="w-16 h-16 rounded-full bg-red-50 border-4 border-red-100
                    flex items-center justify-center mx-auto mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-500"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5
                         4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
        </div>
        <h3 class="text-center font-bold text-gray-900 text-lg mb-2"
            style="font-family: 'Playfair Display', serif;">
            Hapus Layanan?
        </h3>
        <p class="text-center text-gray-500 text-sm mb-1">
            Anda akan menghapus layanan:
        </p>
        <p id="deleteServiceName"
           class="text-center font-semibold text-pink-600 text-sm mb-7 px-4 truncate"></p>
        <p class="text-center text-xs text-gray-400 mb-7">
            Tindakan ini tidak bisa dibatalkan. Gambar terkait juga akan ikut terhapus.
        </p>

        {{-- Form hapus yang di-submit via JS --}}
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex gap-3">
                <button type="button"
                        onclick="closeDeleteModal()"
                        class="flex-1 py-3 font-semibold text-sm text-gray-600
                               bg-gray-100 hover:bg-gray-200 transition-colors rounded-xl">
                    Batal
                </button>
                <button type="submit"
                        class="flex-1 py-3 rounded-xl font-semibold text-sm text-white
                               bg-red-500 hover:bg-red-600 transition-colors shadow-md
                               shadow-red-100">
                    Ya, Hapus
                </button>
            </div>
        </form>
    </div>
</div>


{{-- ╔══════════════════════════════════════════════╗
     ║  SIDEBAR                                    ║
     ╚══════════════════════════════════════════════╝ --}}
<aside class="sidebar">

    {{-- Logo --}}
    <div class="p-6 border-b border-pink-100 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-pink-400 to-pink-600
                        flex items-center justify-center shadow-md shadow-pink-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                    <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                    <line x1="9" y1="9" x2="9.01" y2="9"/>
                    <line x1="15" y1="9" x2="15.01" y2="9"/>
                </svg>
            </div>
            <div>
                <p class="sidebar-logo">Lumière</p>
                <p class="text-xs text-gray-400 -mt-0.5">Admin Panel</p>
            </div>
        </div>
        {{-- Close Sidebar Button (Mobile) --}}
        <button onclick="toggleSidebar()" class="md:hidden text-gray-400 hover:text-pink-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    {{-- Navigasi --}}
    <nav class="flex-1 overflow-y-auto p-4 space-y-1">

        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest px-3 mb-3 mt-1">
            Menu Utama
        </p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" class="nav-item">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1
                             0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0
                             001 1m-6 0h6"/>
                </svg>
            </span>
            Dashboard
        </a>

        {{-- Kelola Layanan (aktif) --}}
        <a href="{{ route('admin.services.index') }}" class="nav-item active">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0
                             00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2
                             0 012 2"/>
                </svg>
            </span>
            Kelola Layanan
        </a>

        {{-- Kelola Produk --}}
        <a href="{{ route('admin.products.index') }}" class="nav-item">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </span>
            Kelola Produk
        </a>

        <div class="border-t border-pink-100 my-3"></div>
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest px-3 mb-3">
            Lainnya
        </p>

        {{-- Lihat Website --}}
        <a href="{{ route('home') }}" target="_blank" class="nav-item">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0
                             0v6m0-6L10 14"/>
                </svg>
            </span>
            Lihat Website
        </a>
    </nav>

    {{-- Footer Sidebar: Info User --}}
    <div class="p-4 border-t border-pink-100">
        <div class="flex items-center gap-3 p-3 bg-pink-50 rounded-xl">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-pink-400 to-rose-400
                        flex items-center justify-center text-white font-bold text-sm shadow-sm">
                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-800 truncate">
                    {{ Auth::user()->name ?? 'Admin' }}
                </p>
                <p class="text-xs text-gray-400 truncate">
                    {{ Auth::user()->email ?? '' }}
                </p>
            </div>
            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        title="Logout"
                        class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400
                               hover:text-red-500 hover:bg-red-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3
                                 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>


{{-- ╔══════════════════════════════════════════════╗
     ║  MAIN CONTENT                               ║
     ╚══════════════════════════════════════════════╝ --}}
<div class="main-content">

    {{-- ── TOP BAR ──────────────────────────────── --}}
    <header class="topbar">
        {{-- Breadcrumb --}}
        <div class="flex items-center">
            {{-- Mobile Sidebar Toggle --}}
            <button onclick="toggleSidebar()" class="md:hidden text-gray-500 hover:text-pink-600 focus:outline-none p-2 mr-2 -ml-2 rounded-lg hover:bg-pink-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-400">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-pink-500 transition-colors hidden sm:inline-block">
                        Dashboard
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 hidden sm:inline-block" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-pink-600 font-semibold">Kelola Layanan</span>
                </div>
                <p class="text-xs text-gray-400 mt-0.5">
                    {{ $services->total() }} layanan terdaftar
                </p>
            </div>
        </div>

        {{-- Tombol Tambah --}}
        <a href="{{ route('admin.services.create') }}"
           class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white
                  font-semibold text-sm px-4 py-2 sm:px-5 sm:py-2.5 rounded-full transition-all
                  shadow-md shadow-pink-200 hover:shadow-pink-300 hover:-translate-y-0.5
                  active:translate-y-0 whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            <span class="hidden sm:inline">Tambah Layanan</span>
            <span class="sm:hidden">Tambah</span>
        </a>
    </header>

    {{-- ── PAGE BODY ────────────────────────────── --}}
    <div class="p-4 sm:p-8 flex-1">

        {{-- Flash Message Sukses --}}
        @if (session('success'))
            <div class="alert-success mb-6">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span>{{ session('success') }}</span>
                <button onclick="this.closest('.alert-success').remove()"
                        class="ml-auto text-green-400 hover:text-green-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        @endif

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

            {{-- Total Layanan --}}
            <div class="bg-white rounded-2xl border border-pink-100 p-5 flex items-center gap-4
                        hover:shadow-md hover:shadow-pink-50 transition-shadow">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-400 to-rose-400
                            flex items-center justify-center shadow-md shadow-pink-200 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0
                                 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900"
                       style="font-family: 'Playfair Display', serif;">
                        {{ $services->total() }}
                    </p>
                    <p class="text-xs text-gray-400 font-medium">Total Layanan</p>
                </div>
            </div>

            {{-- Harga Tertinggi --}}
            <div class="bg-white rounded-2xl border border-pink-100 p-5 flex items-center gap-4
                        hover:shadow-md hover:shadow-pink-50 transition-shadow">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-400
                            flex items-center justify-center shadow-md shadow-amber-100 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11
                                 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21
                                 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-bold text-gray-900 leading-tight"
                       style="font-family: 'Playfair Display', serif;">
                        Rp {{ $services->count() > 0 ? number_format($services->max('price'), 0, ',', '.') : '—' }}
                    </p>
                    <p class="text-xs text-gray-400 font-medium">Harga Tertinggi</p>
                </div>
            </div>

            {{-- Harga Terendah --}}
            <div class="bg-white rounded-2xl border border-pink-100 p-5 flex items-center gap-4
                        hover:shadow-md hover:shadow-pink-50 transition-shadow">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-teal-400 to-emerald-500
                            flex items-center justify-center shadow-md shadow-teal-100 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-bold text-gray-900 leading-tight"
                       style="font-family: 'Playfair Display', serif;">
                        Rp {{ $services->count() > 0 ? number_format($services->min('price'), 0, ',', '.') : '—' }}
                    </p>
                    <p class="text-xs text-gray-400 font-medium">Harga Terendah</p>
                </div>
            </div>

        </div>

        {{-- ── TABEL DATA ─────────────────────── --}}
        <div class="table-wrap">

            {{-- Header Tabel dengan search (opsional / dekoratif) --}}
            <div class="px-6 py-4 border-b border-pink-50 flex items-center justify-between">
                <div>
                    <h2 class="font-semibold text-gray-800 text-base"
                        style="font-family: 'Playfair Display', serif;">
                        Daftar Layanan Salon
                    </h2>
                    <p class="text-xs text-gray-400 mt-0.5">
                        Halaman {{ $services->currentPage() }} dari {{ $services->lastPage() }}
                    </p>
                </div>
                {{-- Hint --}}
                <span class="text-xs text-gray-400 hidden sm:block">
                    Geser tabel ke kanan pada HP
                </span>
            </div>

            @if($services->isEmpty())
                {{-- ── EMPTY STATE ─────────────── --}}
                <div class="empty-state">
                    <div class="w-20 h-20 rounded-full bg-pink-50 border-2 border-dashed border-pink-200
                                flex items-center justify-center mx-auto mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-pink-300"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9
                                     5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-700 text-lg mb-2"
                        style="font-family: 'Playfair Display', serif;">
                        Belum Ada Layanan
                    </h3>
                    <p class="text-sm text-gray-400 mb-6 max-w-xs mx-auto">
                        Mulai tambahkan layanan salon pertama Anda sekarang agar pelanggan bisa melihatnya.
                    </p>
                    <a href="{{ route('admin.services.create') }}"
                       class="inline-flex items-center gap-2 bg-pink-500 text-white font-semibold
                              text-sm px-6 py-3 rounded-full hover:bg-pink-600 transition-all
                              shadow-md shadow-pink-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Layanan Pertama
                    </a>
                </div>

            @else
                {{-- ── TABEL ───────────────────── --}}
                <div class="w-full overflow-x-auto">
                    <table class="w-full min-w-[700px]">
                        <thead>
                            <tr>
                                <th style="width:48px;">#</th>
                                <th>Gambar</th>
                                <th>Nama Layanan</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Ditambahkan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    {{-- No. Urut --}}
                                    <td class="text-xs text-gray-400 font-mono pl-6">
                                        {{ ($services->currentPage() - 1) * $services->perPage() + $loop->iteration }}
                                    </td>

                                    {{-- Thumbnail --}}
                                    <td>
                                        @if($service->image_path)
<img src="{{ Storage::disk('s3')->url($service->image_path) }}"
     alt="{{ $service->title }}"
     class="thumb" />
                                        @else
                                            <div class="thumb-placeholder">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-5 h-5 text-pink-300" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586
                                                             a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2
                                                             0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Nama --}}
                                    <td>
                                        <p class="font-semibold text-gray-800 text-sm whitespace-nowrap">
                                            {{ $service->title }}
                                        </p>
                                    </td>

                                    {{-- Deskripsi (terpotong) --}}
                                    <td class="max-w-xs">
                                        <p class="text-xs text-gray-400 font-light leading-relaxed
                                                  line-clamp-2">
                                            {{ $service->description }}
                                        </p>
                                    </td>

                                    {{-- Harga --}}
                                    <td>
                                        <span class="price-badge">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-3 h-3" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3
                                                         2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0
                                                         1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9
                                                         0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Rp {{ number_format($service->price, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    {{-- Tanggal --}}
                                    <td class="text-xs text-gray-400 whitespace-nowrap">
                                        {{ $service->created_at->format('d M Y') }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td>
                                        <div class="flex items-center justify-center gap-2">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                               class="btn-edit">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-3.5 h-3.5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor"
                                                     stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0
                                                             002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828
                                                             15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>

                                            {{-- Hapus (panggil modal) --}}
                                            <button type="button"
                                                    class="btn-delete"
                                                    onclick="openDeleteModal(
                                                        {{ $service->id }},
                                                        '{{ addslashes($service->title) }}'
                                                    )">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-3.5 h-3.5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor"
                                                     stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2
                                                             0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0
                                                             00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- ── PAGINASI ─────────────────── --}}
                @if($services->hasPages())
                    <div class="px-6 py-4 border-t border-pink-50 flex flex-col sm:flex-row
                                items-center justify-between gap-4">
                        <p class="text-xs text-gray-400">
                            Menampilkan
                            <span class="font-semibold text-gray-600">{{ $services->firstItem() }}</span>
                            –
                            <span class="font-semibold text-gray-600">{{ $services->lastItem() }}</span>
                            dari
                            <span class="font-semibold text-gray-600">{{ $services->total() }}</span>
                            layanan
                        </p>

                        {{-- Paginasi Manual (tanpa Bootstrap) --}}
                        <div class="flex items-center gap-1.5 flex-wrap justify-center">

                            {{-- Prev --}}
                            @if($services->onFirstPage())
                                <span class="w-8 h-8 flex items-center justify-center rounded-lg
                                             text-gray-300 cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $services->previousPageUrl() }}"
                                   class="w-8 h-8 flex items-center justify-center rounded-lg border
                                          border-pink-200 text-pink-500 hover:bg-pink-500 hover:text-white
                                          hover:border-pink-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </a>
                            @endif

                            {{-- Nomor Halaman --}}
                            @foreach($services->getUrlRange(1, $services->lastPage()) as $page => $url)
                                @if($page == $services->currentPage())
                                    <span class="w-8 h-8 flex items-center justify-center rounded-lg
                                                 bg-pink-500 text-white text-sm font-semibold">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                       class="w-8 h-8 flex items-center justify-center rounded-lg border
                                              border-transparent text-gray-500 hover:border-pink-200
                                              hover:text-pink-500 text-sm transition-all">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if($services->hasMorePages())
                                <a href="{{ $services->nextPageUrl() }}"
                                   class="w-8 h-8 flex items-center justify-center rounded-lg border
                                          border-pink-200 text-pink-500 hover:bg-pink-500 hover:text-white
                                          hover:border-pink-500 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            @else
                                <span class="w-8 h-8 flex items-center justify-center rounded-lg
                                             text-gray-300 cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            @endif

                        </div>
                    </div>
                @endif

            @endif
            {{-- akhir @if isEmpty --}}

        </div>
        {{-- akhir .table-wrap --}}

    </div>
    {{-- akhir page body --}}

</div>
{{-- akhir .main-content --}}


{{-- ── JAVASCRIPT ──────────────────────────────── --}}
<script>
    /* ─── Toggle Sidebar Mobile ─── */
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        sidebar.classList.toggle('open');
        
        if (sidebar.classList.contains('open')) {
            overlay.classList.remove('hidden', 'pointer-events-none');
            setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        } else {
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden', 'pointer-events-none'), 300);
        }
    }

    /* ─── Modal Hapus ─── */
    function openDeleteModal(id, name) {
        document.getElementById('deleteServiceName').textContent = name;
        document.getElementById('deleteForm').action =
            '/admin/services/' + id;
        document.getElementById('deleteModal').classList.add('open');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('open');
    }

    // Tutup modal jika klik backdrop
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });

    // Tutup modal dengan Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeDeleteModal();
    });

    /* ─── Auto-dismiss flash alert setelah 4 detik ─── */
    setTimeout(() => {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-8px)';
            setTimeout(() => alert.remove(), 500);
        }
    }, 4000);
</script>

</body>
</html>