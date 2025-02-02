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
    <h1 class="mb-4">Reset Password</h1>
    @if (session('status'))
        <div data-flash-message class="flex items-center justify-between p-4 mb-4 text-white transition-opacity duration-500 bg-green-500 rounded-lg">
            <span>{{ session('status') }}</span>
            <button onclick="document.getElementById('flash-message').classList.add('opacity-0')" 
                    class="px-3 py-1 ml-4 font-bold text-white bg-green-700 rounded-sm hover:bg-green-800">
                Close
            </button>
        </div>
    @endif
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <br>
        <x-forms.input name="email" label="Email" type="email"></x-forms.input>        
        <br>
        <x-forms.input name="password" label="Password" type="password"></x-forms.input>        
        <br>
        <x-forms.input name="password_confirmation" label="Password Confirm" type="password"></x-forms.input>        
        <br>
        <button class="px-2 py-1 bg-green-500">Change Password</button>
    </form>
    @vite('resources/js/app.js')
</body>

</html>


