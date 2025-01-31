<x-layouts.app-layout>
    <h1 class="mb-10 text-4xl font-bold">Settings</h1>
    
    <a class="px-3 py-2 text-white border" href="{{ route('user.settings.edit') }}">Edit User</a>
    <div class="flex items-center gap-3 my-5">
        <img class="rounded-full size-20"
            src="{{ Storage::url(Auth::user()->img_path) }}"
            alt="">
        <div class="text-neutral-300">
            <p class="pr-3">{{ Auth::user()->username }}</p>
            <p>{{ Auth::user()->phone }}</p>
            <p>location: {{ Auth::user()->address }}</p>
        </div>
    </div>

    {{-- <a class="px-3 py-2 text-white border" href="{{ route('settings.change-email') }}">Change Email</a> --}}
    <a class="px-3 py-2 text-white border" href="{{ route('settings.change-password') }}">Change Password</a>
    {{-- <form action="" method="POST">
        @csrf
        @method('PATCH')

        <label for="balance">Balance</label>
        <input class="p-1 rounded-md dark:text-neutral-300 dark:bg-neutral-700" value="{{ old('balance', Auth::user()->balance) }}" id="balance" name="balance" type="number">
        <input class="block mt-3" type="submit" value="Submit">
    </form> --}}
</x-layouts.app-layout>
