<x-layouts.app-layout>
    <form action="{{ route('settings.update-password') }}" method="POST">
        @csrf
        <x-forms.input name="old_password" label="Current Password" type="password"></x-forms.input>
        <x-forms.input name="password" label="New Password" type="password"></x-forms.input>
        <x-forms.input name="password_confirmation" label="New Password Repeat" type="password"></x-forms.input>
        <input type="submit" value="Change Password">
    </form>
</x-layouts.app-layout>