<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="relative flex flex-col gap-12 font-sans antialiased dark:bg-neutral-900 h-dvh dark:text-white/50">
    @once
        <div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]"><div class="absolute bottom-0 left-0 right-0 top-0 bg-[radial-gradient(circle_800px_at_100%_200px,#d5c5ff,transparent)]"></div></div>
        <div class="absolute top-0 z-[-2] h-full w-full dark:bg-neutral-900 dark:bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"></div>
        <x-navbar></x-navbar>
    @endonce
    <div class="container flex-1 px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
    @once
        <x-footer></x-footer>
        <script>
            const isAuthenticated = "{{ Auth::user() }}" ? true : false
            const authenticatedUsersName = isAuthenticated ? "{{ Auth::user() }}" : null
            // const authenticatedUserName = isAuthenticated ? "{{ Auth::user() }}" : null
            const authenticatedUser = @json(auth()->user() ?? null);
            // const authenticatedUser = isAuthenticated ? JSON.parse("{{ Auth::user() }}") : null
            console.log(authenticatedUser)
            // const authenticatedUserName = isAuthenticated ? JSON.parse(k) : null
        </script>
    @endonce
    @vite('resources/js/app.js')
</body>

</html>
