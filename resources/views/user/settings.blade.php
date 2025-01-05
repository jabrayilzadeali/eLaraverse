<x-layouts.app-layout>
    <h1 class="mb-10 text-4xl font-bold">Settings</h1>
    <form action="" method="POST">
        @csrf
        @method('PATCH')

        <label for="balance">Balance</label>
        <input class="p-1 rounded-md dark:text-neutral-300 dark:bg-neutral-700" value="{{ old('balance', Auth::user()->balance) }}" id="balance" name="balance" type="number">
        <input class="block mt-3" type="submit" value="Submit">
    </form>
</x-layouts.app-layout>
