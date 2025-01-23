<x-layouts.admin-layout>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <x-forms.input name="name" label="wow"></x-forms.input>
        <select id="" name="parent_id" class="max-w-60 col-start-1 row-start-1 w-full appearance-none rounded-md bg-white dark:bg-neutral-800 dark:text-neutral-200 py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            @foreach ($categories as $category)
                {{-- <option @if (old('category', $product->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option> --}}
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Add" class="block">
    </form>
</x-layouts.admin-layout>
