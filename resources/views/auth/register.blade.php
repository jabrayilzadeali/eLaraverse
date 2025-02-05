<x-layouts.auth-layout>
    <div class="flex flex-col justify-center min-h-full px-6 py-12 h-dvh lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="{{ route('home') }}">
                <img class="w-auto h-20 mx-auto" src="{{ asset('img/logo.png') }}" alt="Your Company">
            </a>
            <h2 class="mt-10 font-bold tracking-tight text-center text-gray-900 dark:text-gray-100 text-2xl/9">Register
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/register" method="POST">
                @csrf
                <x-forms.input label="Email" name="email" inputClasses="w-full"></x-forms.input>
                <x-forms.input label="Username" name="username" inputClasses="w-full"></x-forms.input>
                <x-forms.input label="Password" name="password" inputClasses="w-full" type="password"></x-forms.input>
                <x-forms.input label="Re enter password" name="password_confirmation"
                    inputClasses="w-full" type="password"></x-forms.input>


                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Sign in
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-gray-500 dark:text-gray-400 text-sm/6">
                Already a member
                <a href="/login"
                    class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-600">Login</a>
            </p>
        </div>
    </div>
</x-layouts.auth-layout>
