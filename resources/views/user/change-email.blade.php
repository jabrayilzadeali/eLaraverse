<x-layouts.app-layout>
    <form action="{{ route('settings.update-email') }}" method="POST">
        @csrf
        <x-forms.input name="email" label="Change Email" :item="Auth::user()->email" type="email"></x-forms.input>
        <input type="submit" class="px-3 py-2 mt-5 border rounded-md text-neutral-300" value="Change Email">
    </form>
</x-layouts.app-layout>
