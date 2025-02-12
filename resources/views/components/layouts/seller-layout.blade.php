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
    <div class="grid grid-cols-1 overflow-x-visible sm:grid-cols-[fit-content(20rem)_1fr]">
        <div class="top-0 hidden p-5 bg-black md:block h-dvh">
            <div class="mt-3">
                <h2 class="font-bold text-white">Welcome {{ auth('seller')->user()->username }}</h2>
                <ul class="flex flex-col gap-3 mt-5">
                    <li><a href="{{ route('sellers.index') }}" class="block px-3 py-3 rounded-md {{ request()->is('sellers/dashboard') ? 'dark:bg-neutral-500/50 dark:text-white' : 'dark:bg-neutral-800/50' }} dark:hover:bg-neutral-700">Home</a></li>
                    <li><a href="{{ route('sellers.orders') }}" class="block px-3 py-3 rounded-md {{ request()->is('sellers/orders') ? 'dark:bg-neutral-500/50 dark:text-white' : 'dark:bg-neutral-800/50 text-neutral-200' }} dark:hover:bg-neutral-700">Orders</a></li>
                    <li><a href="{{ route('sellers.reviews') }}" class="block px-3 py-3 rounded-md {{ request()->is('sellers/reviews') ? 'dark:bg-neutral-500/50 dark:text-white' : 'dark:bg-neutral-800/50 text-neutral-200' }} dark:hover:bg-neutral-700">Reviews</a></li>
                </ul>
                <form data-logout-user action="{{ route('sellers.logout') }}" method="POST">
                    @csrf
                    <button class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300" role="menuitem">Sign Out</button>
                </form>
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
