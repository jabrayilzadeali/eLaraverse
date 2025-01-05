<x-layouts.admin-layout>
    <form class="" method="POST" action="{{ route('admin.products.update', $product->slug) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="font-semibold text-gray-900 dark:text-gray-100 text-base/7">Edit a product</h2>
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="sellers"
                            class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Select User</label>
                            <select id="sellers" name="seller"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach ($sellers as $seller)
                                    <option {{ $product->user_id === $seller->id ? 'selected' : '' }} value="{{ $seller->id }}">{{ $seller->username }}</option>
                                @endforeach
                            </select>
                        @error('seller')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-full">
                        <label for="title" class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Title</label>
                        <div
                            class="flex items-center pl-3 bg-white rounded-md outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}"
                                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="title">
                        </div>
                        @error('title')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">description</label>
                        <div
                            class="flex items-center pl-3 bg-white rounded-md outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="description" id="description" value="{{ old('description', $product->description) }}"
                                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="description">
                        </div>
                        @error('description')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <x-forms.img :img="Storage::url($product->img_path)"></x-forms.img>
                </div>
            </div>

            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="font-semibold text-gray-900 dark:text-gray-100 text-base/7">Personal Information</h2>
                <p class="mt-1 text-gray-600 dark:text-gray-300 text-sm/6">Use a permanent address where you can receive mail.</p>

                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="price" class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Price</label>
                        <div class="mt-2">
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('price')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6 gap-x-6">
            <a href="{{ route('admin.products.index') }}"  class="font-semibold text-gray-900 text-sm/6">Cancel</a>
            <button type="submit"
                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layouts.admin-layout>


