<x-layouts.auth-layout>
    <div class="flex flex-col items-center justify-center min-h-full px-6 py-12 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="w-auto h-10 mx-auto" src="{{ asset('img/logo.png') }}"
                alt="Your Company">
            <h2 class="mt-10 font-bold tracking-tight text-center text-gray-900 dark:text-gray-100 text-2xl/9">Sign in to your Admin account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block font-medium text-gray-900 dark:text-gray-100 text-sm/6">Email address</label>
                    <div class="mt-2">
                        {{-- <input type="email" name="email" id="email" required class="bg-orange-700"> --}}
                        <input type="email" name="email" id="email" required
                            class="block w-full rounded-md bg-white dark:bg-neutral-800 px-3 py-1.5 text-base text-gray-100 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block font-medium text-gray-900 dark:text-gray-100 text-sm/6">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-md bg-white dark:bg-neutral-800 px-3 py-1.5 text-base text-gray-100 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.auth-layout>
