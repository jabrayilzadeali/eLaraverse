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
    <h1 class="mb-4">Please verify your email through the email we've sent you.</h1>
    <p>Didn't get the email</p>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button>Send again</button>
    </form>
    <form data-logout-user action="/logout" method="POST">
        @csrf
        <button class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300" role="menuitem">Sign Out</button>
    </form>
    @vite('resources/js/app.js')
</body>

</html>
