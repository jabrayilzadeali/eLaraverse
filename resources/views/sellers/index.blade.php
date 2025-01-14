<x-layouts.seller-layout>
    <div class="flex justify-between mt-10 mb-3">
        <div class="flex items-center justify-center gap-5">
            <div class="relative">
                <button data-filter-btn
                    class="flex items-center justify-center gap-2 px-4 py-1 border rounded-lg text-neutral-300 border-neutral-600">
                    <x-icons.filter></x-icons.filter>
                    <span>Filter</span>
                </button>
                <dialog data-dialog class="absolute p-5 mt-3 rounded-md position dark:bg-neutral-900 ring-2 ring-white">
                    <form class="flex flex-col gap-5">
                        <div>
                            <label class="dark:text-neutral-300" for="min_price">Min Price</label>
                            <input
                                class="px-2 py-1 rounded-md dark:bg-neutral-800 ring-1 ring-neutral-600 dark:text-neutral-100"
                                type="number" name="min_price" id="min_price"
                                value="{{ old('min_price', request('min_price')) }}">
                        </div>
                        <div>
                            <label class="dark:text-neutral-300" for="max_price">max Price</label>
                            <input
                                class="px-2 py-1 rounded-md dark:bg-neutral-800 ring-1 ring-neutral-600 dark:text-neutral-100"
                                type="number" name="max_price" id="max_price" value="{{ request('max_price') }}">
                        </div>
                        <div>
                            <label class="dark:text-neutral-300" for="min_stock">Min Stock</label>
                            <input
                                class="px-2 py-1 rounded-md dark:bg-neutral-800 ring-1 ring-neutral-600 dark:text-neutral-100"
                                type="number" name="min_stock" id="min_stock" value="{{ request('min_stock') }}">
                        </div>
                        <div>
                            <label class="dark:text-neutral-300" for="max_stock">max Stock</label
                                class="dark:text-neutral-300"abel>
                            <input
                                class="px-2 py-1 rounded-md dark:bg-neutral-800 ring-1 ring-neutral-600 dark:text-neutral-100"
                                type="number" name="max_stock" id="max_stock" value="{{ request('max_stock') }}">
                        </div>

                        <input class="py-1 text-white rounded-md ring-1 ring-white" type="submit" value="Apply">
                    </form>
                </dialog>
            </div>
            <div class="relative">
                <button data-stack-btn>
                    <x-icons.stack></x-icons.stack>
                </button>
                <dialog data-stacks
                    class="absolute p-5 mt-3 rounded-md w-44 position dark:bg-neutral-900 ring-2 ring-white">
                    <h3 class="text-lg text-neutral-100">Hide columns</h3>
                    <form action="" data-stacks-form>
                        @foreach ($stackedColumns as $column)
                            <div>
                                <input data-hide-column={{ $column }} id="{{ $column }}" type="checkbox"
                                    {{ !in_array($column, array_column($columns, 'label')) ? 'checked' : '' }}>
                                <label class="text-neutral-300" for="{{ $column }}">{{ $column }}</label>
                            </div>
                        @endforeach
                        <input type="submit" value="Submit" class="rounded-md text-neutral-100">
                    </form>
                </dialog>
            </div>

            <div class="relative m-[2px] mr-5 float-left">
                <form data-search-form>
                    <label for="inputSearch" class="sr-only">Search</label>
                    <input id="inputSearch" data-search value="{{ old('search', request('search')) }}" name="search"
                        type="text" placeholder="Search..."
                        class="block w-64 py-2 pl-10 pr-4 text-sm border rounded-lg dark:border-none dark:bg-neutral-600 focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400" />
                    <span class="absolute transform -translate-y-1/2 pointer-events-none left-3 top-1/2">
                        <x-icons.search></x-icons.search>
                    </span>
                </form>
            </div>
        </div>
        <button class="flex items-center justify-center gap-2 px-3 bg-blue-600 rounded-md text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
            </svg>
            <a href="{{ route('sellers.create') }}">Add New Product</a>
        </button>
    </div>
    <!-- Table responsive wrapper -->
    
    <x-table.table :items="$products" :columns="$columns" :sorts="$sorts" editLink="sellers.edit" deleteLink="sellers.destroy"></x-table.table>

    {{-- <table class="w-full overflow-x-auto border-t table-auto dark:border-neutral-700">
        <thead>
            <tr class="pt-3 text-neutral-300">
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Slug</th>
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2 text-left">Description</th>
                <th class="px-4 py-2 text-left">Img</th>
                <th class="px-4 py-2 text-left">Rating</th>
                <th class="px-4 py-2 text-left">Is featured</th>
                <th class="px-4 py-2 text-left">In Stock</th>
                <th class="px-4 py-2 text-left">Price</th>
                <th class="px-4 py-2 text-left">Date</th>
                <th class="px-4 py-2 text-left">Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="">
                    <td class="px-4 py-2">{{ $product->id }}</td>
                    <td class="px-4 py-2">{{ $product->slug }}</td>
                    <td class="px-4 py-2">{{ $product->title }}</td>
                    <td class="px-4 py-2">{{ $product->description }}</td>
                    <td class="px-4 py-2">
                        @if (filter_var($product->image_path, FILTER_VALIDATE_URL))
                            <!-- Display the fake image URL generated by Faker -->
                            <img class="mb-4 aspect-square w-full rounded-lg transition-all ease-in-out bg-gray-200 object-cover group-hover:opacity-85 xl:aspect-[7/8]"
                                src="{{ $product->img_path }}" alt="">
                        @else
                            <!-- Display the image stored in storage -->
                            <img class="mb-4 aspect-square max-w-32 w-full rounded-lg transition-all ease-in-out bg-gray-200 object-cover group-hover:opacity-85 xl:aspect-[7/8]"
                                src="{{ Storage::url($product->img_path) }}" alt="">
                        @endif

                    </td>
                    <td class="px-4 py-2">
                        <x-stars class="w-2" rating="5.0"></x-stars>
                    </td>
                    <td class="px-4 py-2">false</td>
                    <td class="px-4 py-2">true</td>
                    <td class="px-4 py-2">{{ $product->price }}</td>
                    <td class="px-4 py-2">{{ $product->created_at->format('d.m.Y') }}</td>
                    <td class="flex gap-2 px-4 py-2">
                        @can('delete', $product)
                            <a href="{{ route('sellers.edit', $product->slug) }}"
                                class="block px-1 py-1 font-semibold bg-green-500 rounded-md text-neutral-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-2 2v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                                </svg>
                            </a>
                        @endcan
                        @can('delete', $product)
                            <form action="{{ route('sellers.destroy', $product->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="px-1 py-1 font-semibold bg-red-500 rounded-md text-neutral-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</x-layouts.seller-layout>
