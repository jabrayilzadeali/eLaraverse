<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="relative flex flex-col gap-12 font-sans antialiased bg-neutral-900 h-dvh dark:text-white/50">
    <div class="absolute top-0 z-[-2] h-full w-full bg-neutral-900 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"></div>
    <x-navbar></x-navbar>
    <div class="container flex-1 px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
    @vite('resources/js/app.js')
    <x-footer></x-footer>
    <script>
        const isAuthenticated = "{{ Auth::user() }}" ? true : false
    </script>
</body>

</html>
