<x-layouts.seller-layout>
    <form class="" method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="font-semibold text-gray-900 dark:text-gray-100 text-base/7">Create a product</h2>
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-forms.input name="title" label="title"></x-forms.input>
                    <x-forms.textarea name="description" label="Description"></x-forms.textarea>
                    <x-forms.img></x-forms.img>
                </div>
            </div>

            <div class="pb-12 border-b border-gray-900/10">
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-forms.input class="sm:col-span-1" name="price" label="Price" type="number"></x-forms.input>
                    <x-forms.input class="sm:col-span-1" name="discount" label="Discount" type="number"></x-forms.input>
                    <x-forms.input class="sm:col-span-1" name="stock" label="Stock" type="number"></x-forms.input>

                    <div class="col-span-full">
                        <label for="categories"
                            class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Select Category</label>
                            <select id="categories" name="category"
                                class="max-w-60 col-start-1 row-start-1 w-full appearance-none rounded-md bg-white dark:bg-neutral-800 dark:text-neutral-200 py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        @error('category')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <label for="attributes"
                            class="block mb-5 text-lg font-medium text-gray-900 dark:text-gray-100">Attributes</label>
                        <div data-attributes>
                            <div class="flex gap-5">
                                <div class="flex justify-between w-full gap-3 my-2">
                                    <input type="text" name="attributes[key][]" class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 dark:bg-neutral-800 dark:text-neutral-200" required></input>
                                    <input type="text" name="attributes[value][]" class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 dark:bg-neutral-800 dark:text-neutral-200" required></input>
                                </div>
                                <button type="button">Remove</button>
                            </div>
                        </div>
                        <button data-add-attribute type="button">Add</button>
                        @error('attributes')
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

    <script>
        const attributes = document.querySelector('[data-attributes]')
        const addAttribute = document.querySelector('[data-add-attribute]')

        attributes.addEventListener('click', (e) => {
            if (e.target.matches('button')) {
                e.target.parentElement.remove()
            }
        })
        addAttribute.addEventListener('click', () => {
            const k = document.createElement('div');
            k.classList.add('flex', 'gap-5');

            k.innerHTML = `
                <div class="flex justify-between w-full gap-3 my-2">
                    <input type="text" name="attributes[key][]" class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 dark:bg-neutral-800 dark:text-neutral-200" required></input>
                    <input type="text" name="attributes[value][]" class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 dark:bg-neutral-800 dark:text-neutral-200" required></input>
                </div type="button">
                <button>Remove</button>
            `
            attributes.appendChild(k)
        })
    </script>


</x-layouts.seller-layout>
