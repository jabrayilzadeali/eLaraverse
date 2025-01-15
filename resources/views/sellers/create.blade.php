<x-layouts.seller-layout>
    <form class="" method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="font-semibold text-gray-900 dark:text-gray-100 text-base/7">Create a product</h2>
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="title"
                            class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Title</label>
                        <div
                            class="flex items-center pl-3 bg-white rounded-md outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="title">
                        </div>
                        @error('title')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="description"
                            class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">description</label>
                        <div
                            class="flex items-center pl-3 bg-white rounded-md outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="description" id="description" value="{{ old('description') }}"
                                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                placeholder="description">
                        </div>
                        @error('description')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>


                    <x-forms.img></x-forms.img>
                </div>
            </div>

            <div class="pb-12 border-b border-gray-900/10">
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="price"
                            class="block font-medium text-gray-900 dark:text-gray-100 text-sm/6">Price</label>
                        <div class="mt-2">
                            <input type="number" name="price" id="price" value="{{ old('price') }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('price')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="discount"
                            class="block font-medium text-gray-900 dark:text-gray-100 text-sm/6">Discount</label>
                        <div class="mt-2">
                            <input type="number" name="discount" id="discount" value="{{ old('discount') }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('discount')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="categories"
                            class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Select Category</label>
                            <select id="categories" name="category"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        @error('category')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6 gap-x-6">
            <a href="{{ route('products.index') }}" class="font-semibold text-gray-900 text-sm/6">Cancel</a>
            <button type="submit"
                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>


</x-layouts.seller-layout>
