<x-layouts.auth-layout>
    <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="w-auto h-10 mx-auto" src="{{ asset('img/logo.png') }}"
                alt="Your Company">
            <h2 class="mt-10 font-bold tracking-tight text-center text-gray-900 dark:text-gray-100 text-2xl/9">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form data-form class="space-y-6" action="{{ route('login.store') }}" method="POST">
                @csrf
                <input type="hidden" data-user-type name="user_type" value="costumer">
                <div>
                    <label for="email" class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Password</label>
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <button type="submit" data-sign-up
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
                </div>
                @error('user_type')
                    <p class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
                @enderror
            </form>

            <p class="mt-10 text-center text-gray-500 text-sm/6">
                Not a member
                <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Register</a>
            </p>
        </div>
    </div>

    {{-- <script>
        const active = "w-24 px-3 py-2 dark:bg-indigo-700 dark:text-white"
        const notActive = "w-24 px-3 py-2 dark:bg-indigo-100 dark:text-black"
        

        const costumerForm = document.querySelector('[data-costumer-form]')
        const sellerForm = document.querySelector('[data-seller-form]')
        const userType = document.querySelector('[data-user-type]')
        
        document.querySelector('[data-form]').addEventListener('submit', () => {
            localStorage.setItem('firstTimeLogin', true)
        })
        
        costumerForm.addEventListener('click', () => {
            userType.value = 'costumer'
            costumerForm.classList = active
            sellerForm.classList = notActive
        })
        
        sellerForm.addEventListener('click', () => {
            userType.value = 'seller'
            sellerForm.classList = active
            costumerForm.classList = notActive
        })
        
    </script> --}}
</x-layouts.auth-layout>
