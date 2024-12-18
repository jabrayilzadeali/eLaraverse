<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="flex flex-col gap-12 font-sans antialiased h-dvh dark:bg-gray-950 dark:text-white/50">
        <x-navbar></x-navbar>
        <div class="flex-1 px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
        @vite('resources/js/app.js')
        {{-- <script>
            const isAuthenticated = "{{ Auth::user() }}" ? true : false
        </script> --}}
        <x-footer></x-footer>
    </body>
</html>

