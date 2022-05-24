{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 20.05.2022
Description: Main webpage template
--}}

{{-- Inspired by Breeze's default app layout and my preparation project --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-ico">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            <!-- Page Header -->
            <header class="fixed w-full z-10 top-0 right-0">
                @include('layouts.header')
            </header>
            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
            <!-- Page Footer -->
            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>
