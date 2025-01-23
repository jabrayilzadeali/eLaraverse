<x-layouts.admin-layout>
    <a href="{{ route('admin.categories.create') }}" class="bg-blue-400">Create</a>
    <ul class="flex flex-col gap-4 mt-4 ml-5">
        @foreach ($categories as $category)
            <x-category :currentCategory="$currentCategory->id ?? 0" :category="$category"></x-category>
        @endforeach
    </ul>
</x-layouts.admin-layout>
