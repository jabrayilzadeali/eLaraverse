<x-layouts.app-layout>
    <h1 class="mb-10 text-4xl font-bold">Settings</h1>
    
    <div class="flex items-center gap-3">
        <img class="rounded-full size-8"
            src="{{ Storage::url(Auth::user()->img_path) }}"
            alt="">
        <p class="pr-3">{{ Auth::user()->username }}</p>
    </div>
    <p>055-123-45-67</p>
    <p>location: Lorem ipsum dolor sit amet.</p>

    <a href="{{ route('settings.change-password') }}">Change Password</a>
    <form action="" method="POST">
        @csrf
        @method('PATCH')

        <label for="balance">Balance</label>
        <input class="p-1 rounded-md dark:text-neutral-300 dark:bg-neutral-700" value="{{ old('balance', Auth::user()->balance) }}" id="balance" name="balance" type="number">
        <input class="block mt-3" type="submit" value="Submit">
    </form>
</x-layouts.app-layout>
