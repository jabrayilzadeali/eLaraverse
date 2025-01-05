<!DOCTYPE html>
<html class="h-full dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body class="dark:bg-neutral-900 dark:text-neutral-200">

        <div class="grid grid-cols-1 sm:grid-cols-[17rem_1fr]">
            <div class="sticky top-0 hidden p-5 bg-black sm:block h-dvh">
                <div class="mt-3">
                    <h2 class="font-bold text-white">Welcome {{ auth('admin')->user()->username }}</h2>
                    <ul class="flex flex-col gap-3 mt-5">
                        <li><a href="{{ route('admin.dashboard') }}" class="block px-3 py-3 rounded-md {{ request()->is('admin/dashboard') ? 'dark:bg-neutral-500/50' : 'dark:bg-neutral-800/50' }} dark:hover:bg-neutral-700">Home</a></li>
                        <li><a href="admin/users" class="block px-3 py-3 rounded-md {{ request()->is('admin/users/*') ? 'dark:bg-neutral-500/50' : 'dark:bg-neutral-800/50' }} dark:hover:bg-neutral-700">Users</a></li>
                        <li><a href="{{ route('admin.products.index') }}" class="block px-3 py-3 rounded-md {{ request()->is('admin/products/*') ? 'dark:bg-neutral-500/50' : 'dark:bg-neutral-800/50' }} dark:hover:bg-neutral-700">Products</a></li>
                        <li><a href="admin/categories" class="block px-3 py-3 rounded-md {{ request()->is('admin/categories/*') ? 'dark:bg-neutral-500/50' : 'dark:bg-neutral-800/50' }} dark:hover:bg-neutral-700">Categories</a></li>
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
    </body>
</html>
