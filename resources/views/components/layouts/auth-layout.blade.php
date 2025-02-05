<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-gray-950 dark:text-white/50">

        <button data-dark-mode-toggle-button type="button"
            class="absolute p-1 text-gray-600 rounded-full left-5 top-5 dark:text-gray-400 hover:text-black dark:hover:text-white focus:outline-hidden focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">Dark Mode</span>
            <x-icons.sun data-sun-icon class="hidden"></x-icons.sun>
            <x-icons.moon data-moon-icon></x-icons.moon>
        </button>
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
        @vite('resources/js/theme.js')
    </body>
</html>
