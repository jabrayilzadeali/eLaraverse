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

<body class="relative flex flex-col gap-12 font-sans antialiased dark:bg-neutral-900 h-dvh dark:text-white/50">
    <div class="grid grid-cols-1 md:grid-cols-[17rem_1fr]">
        <div class="sticky top-0 hidden p-5 bg-black md:block h-dvh">
            <div class="mt-3">
                <h2 class="font-bold text-white">Welcome Ali</h2>
                <ul>
                    <li><a href="#">Create</a></li>
                </ul>
            </div>
        </div>
        <div class="container flex-1 px-2 mx-auto sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </div>
    <script>
        const isAuthenticated = "{{ Auth::user() }}" ? true : false
        const authenticatedUsersName = isAuthenticated ? "{{ Auth::user() }}" : null
    </script>

    {{-- @vite('resources/js/app.js') --}}
    @vite('resources/js/admin.js')
</body>

</html>
