<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Luxury Salon') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Base Colors & Variables */
            :root {
                --luxury-bg: #fdfdfd;
                --scrollbar-pink: #f4b0c7; /* Warna pink elegan */
                --scrollbar-track: #fbf0f4;
            }

            /* Body Styling */
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                background-color: var(--luxury-bg);
                color: #333333;
            }

            /* Heading Styling */
            h1, h2, h3 {
                font-family: 'Playfair Display', serif;
                font-weight: 600;
                color: #1a1a1a;
            }

            /* Custom Pink Scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                background: var(--scrollbar-track);
            }

            ::-webkit-scrollbar-thumb {
                background: var(--scrollbar-pink);
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #e094ae; /* Pink sedikit lebih gelap saat di-hover */
            }
        </style>

        @stack('styles')
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white shadow-sm border-b border-pink-50">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-grow">
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')
    </body>
</html>