<!DOCTYPE html>
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    @if (session('status'))
        <div data-flash-message class="flex items-center justify-between p-4 mb-4 text-white transition-opacity duration-500 bg-green-500 rounded-lg">
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <h1 class="mb-4">Forgot Password</h1>
    <p></p>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <x-forms.input name="email" label="Email" type="email"></x-forms.input>        
        <button>Change Password</button>
    </form>
    {{-- @vite('resources/js/app.js') --}}
</body>

</html>

