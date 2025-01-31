<x-layouts.app-layout>
    <div>
        <div>
            <!--
            Mobile filter dialog
      
            Off-canvas filters for mobile, show/hide based on off-canvas filters state.
          -->
            <div data-mobile-filter-menu class="relative z-40 hidden lg:hidden" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-black/25" aria-hidden="true"></div>

                <div class="fixed inset-0 z-40 flex">
                    <div
                        class="relative flex flex-col max-w-xs py-4 pb-12 ml-auto overflow-y-auto bg-white shadow-xl dark:bg-neutral-900 size-full">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Filters</h2>
                            <button type="button" data-mobile-filter-close
                                class="flex items-center justify-center p-2 -mr-2 text-gray-400 bg-white rounded-md dark:text-gray-100 dark:bg-transparent size-10">
                                <span class="sr-only">Close menu</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Filters -->
                        <form class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list" class="px-2 py-3 font-medium">
                                <li>
                                    <a href="#" class="block px-2 py-3 font-bold text-gray-100">Totes</a>
                                </li>
                            </ul>

                            {{-- <div class="px-4 py-6 border-t border-gray-200">
                                <h3 class="flow-root -mx-2 -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full px-2 py-3 text-gray-400 bg-white dark:bg-neutral-900 hover:text-gray-500"
                                        aria-controls="filter-section-mobile-0" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-gray-200">Color</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-0">
                                    <div class="space-y-6">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-mobile-color-0" name="color[]" value="white"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-color-0"
                                                class="flex-1 min-w-0 text-gray-500 dark:text-gray-300">White</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>

            <main class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-baseline justify-between pb-6 border-b border-gray-200">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl dark:text-gray-300">
                        {{-- {{ !is_null($currentCategory) ? $currentCategory->name . ' kategoriya' : 'Bütün Məhsullar' }} --}}
                        {{ isset($currentCategory) ? $currentCategory->name . ' kategoriya' : 'Bütün Məhsullar' }}
                    </h1>
                    <div class="flex items-center">
                        <div class="relative inline-block text-left">
                            <div>
                                <button type="button" data-sort-products-btn
                                    class="inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 group dark:hover:text-gray-400 hover:text-gray-900"
                                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                                    <div class="">
                                        <p class="text-base font-medium text-gray-700 dark:text-gray-300">
                                            Sorted by:
                                            @php
                                                $sortParams = request()->get('sort', []); // Get the 'sort' array from the query string
                                            @endphp
                                            @switch(key($sortParams))
                                                @case('discounted_price')
                                                    {{ current($sortParams) === 'asc' ? 'Price: Low to High' : 'Price: High to Low' }}
                                                @break

                                                @case('created_at')
                                                    Newest
                                                @break

                                                @case('popularity')
                                                    Most Popular
                                                @break

                                                @case('rating')
                                                    Best Rating
                                                @break

                                                @default
                                                    Default
                                            @endswitch
                                        </p>
                                    </div>
                                    <svg class="ml-1 -mr-1 text-gray-400 dark:text-gray-300 size-5 shrink-0 dark:group-hover:text-gray-400 group-hover:text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div class="absolute right-0 z-10 hidden w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl dark:bg-neutral-800 ring-1 ring-black/5 focus:outline-none"
                                data-sort-menu role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                tabindex="-1">
                                <div class="flex flex-col py-1" role="none">
                                    <button
                                        class="{{ is_null(request('sort')) ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm text-left"
                                        role="menuitem" tabindex="-1" id="menu-item-2">Default</button>
                                    <button data-sort-by="created_at" data-sort-direction="desc"
                                        class="{{ (request('sort')['created_at'] ?? null) === 'desc' ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm text-left"
                                        role="menuitem" tabindex="-1" id="menu-item-2">Newest</button>
                                    <button data-sort-by="discounted_price" data-sort-direction="asc"
                                        class="{{ (request('sort')['discounted_price'] ?? null) === 'asc' ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm text-left"
                                        role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</button>
                                    <button data-sort-by="discounted_price" data-sort-direction="desc"
                                        class="{{ (request('sort')['discounted_price'] ?? null) === 'desc' ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm text-left"
                                        role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</button>
                                    <button data-sort-by="discount" data-sort-direction="desc"
                                        class="{{ (request('sort')['discount'] ?? null) === 'desc' ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm text-left"
                                        role="menuitem" tabindex="-1" id="menu-item-4">Discount: High to
                                        Low</button>
                                    {{-- <a href="{{ route('products.index', ['sortBy' => 'created_at', 'direction' => 'desc']) }}"
                                        class="{{ request('created_at') === 'price' && request('direction') === 'desc' ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="menu-item-2">Newest</a>
                                    <a href="{{ route('products.index', ['sortBy' => 'discounted_price', 'direction' => 'asc']) }}"
                                        class="{{ request('sortBy') === 'discounted_price' && request('direction') === 'asc' ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</a>
                                    <a href="{{ route('products.index', ['sortBy' => 'discounted_price', 'direction' => 'desc']) }}"
                                        class="{{ request('sortBy') === 'discounted_price' && request('direction') === 'desc' ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-300' }} block px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</a> --}}
                                </div>
                            </div>
                        </div>

                        <button type="button" class="p-2 ml-5 -m-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                            <span class="sr-only">View grid</span>
                            <svg class="size-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.25 2A2.25 2.25 0 0 0 2 4.25v2.5A2.25 2.25 0 0 0 4.25 9h2.5A2.25 2.25 0 0 0 9 6.75v-2.5A2.25 2.25 0 0 0 6.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 2 13.25v2.5A2.25 2.25 0 0 0 4.25 18h2.5A2.25 2.25 0 0 0 9 15.75v-2.5A2.25 2.25 0 0 0 6.75 11h-2.5Zm9-9A2.25 2.25 0 0 0 11 4.25v2.5A2.25 2.25 0 0 0 13.25 9h2.5A2.25 2.25 0 0 0 18 6.75v-2.5A2.25 2.25 0 0 0 15.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 11 13.25v2.5A2.25 2.25 0 0 0 13.25 18h2.5A2.25 2.25 0 0 0 18 15.75v-2.5A2.25 2.25 0 0 0 15.75 11h-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button type="button" data-mobile-filter-open
                            class="p-2 ml-4 -m-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                            <span class="sr-only">Filters</span>
                            <svg class="size-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 0 1 .628.74v2.288a2.25 2.25 0 0 1-.659 1.59l-4.682 4.683a2.25 2.25 0 0 0-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 0 1 8 18.25v-5.757a2.25 2.25 0 0 0-.659-1.591L2.659 6.22A2.25 2.25 0 0 1 2 4.629V2.34a.75.75 0 0 1 .628-.74Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <section aria-labelledby="products-heading" class="pt-6 pb-24">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <!-- Filters -->
                        <form data-filter class="hidden lg:block">
                            <h3 class="sr-only">Categories</h3>
                            @if (Request::is('category/*'))
                                <a href="{{ route('products.index') }}">Go Back</a>
                            @endif
                            <ul role="list" class="flex flex-col gap-4">
                                {{-- {{ $currentCategory ?? '' }} --}}
                                @foreach ($categories as $category)
                                    <x-category-products :category="$category"></x-category-products>
                                    {{-- <x-category :currentCategory="$currentCategory->id ?? 0" :category="$category"></x-category> --}}
                                @endforeach
                            </ul>

                            <h3>Minimum and maximum</h3>
                            <input
                                class="px-2 py-1 rounded-md w-28 dark:bg-neutral-800 ring-1 ring-neutral-600 dark:text-neutral-100"
                                type="number" name="min_price" id="min_price"
                                value="{{ old('min_price', request('min_price')) }}">

                            <input
                                class="px-2 py-1 rounded-md w-28 dark:bg-neutral-800 ring-1 ring-neutral-600 dark:text-neutral-100"
                                type="number" name="max_price" id="max_price" value="{{ request('max_price') }}">
                            {{-- <div class="py-6 border-b border-gray-200">
                                <h3 class="flow-root -my-3">
                                    <!-- Expand/collapse section button -->
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-3 text-sm text-gray-400 bg-white dark:bg-transparent hover:text-gray-500"
                                        aria-controls="filter-section-0" aria-expanded="false">
                                        <span class="font-semibold text-gray-900 dark:text-gray-200">Color</span>
                                        <span class="flex items-center ml-6 dark:text-gray-200">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>

                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-0">
                                    <div class="space-y-4">
                                        <div class="flex gap-3">
                                            <div class="flex items-center h-5 shrink-0">
                                                <div class="grid grid-cols-1 group size-4">
                                                    <input id="filter-color-0" name="color[]" value="white"
                                                        type="checkbox"
                                                        class="col-start-1 row-start-1 bg-white border border-gray-300 rounded appearance-none checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                        viewBox="0 0 14 14" fill="none">
                                                        <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                            d="M3 8L6 11L11 3.5" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                            d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-color-0"
                                                class="text-sm text-gray-600 dark:text-gray-300">White</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <input type="submit" value="Apply">
                        </form>

                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                                @foreach ($products as $product)
                                    <x-product-item :id="$product->id" :slug="route('products.show', $product->slug)" :img="$product->img_path"
                                        :title="$product->title" :rating="$product->rating" :price="$product->price" :discounted_price="$product->discounted_price"
                                        :stock="$product->stock" :discount="$product->discount" :inWishlist="$product->inWishlist"></x-product-item>
                                @endforeach
                            </div>
                            <div class="mt-10">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script>
        const form = document.querySelector('[data-filter]')
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const inputs = form.querySelectorAll("input[type='number']")
            let url = new URL(window.location.href);

            inputs.forEach(input => {
                if (input.value.trim() && input.value !== "") {
                    url.searchParams.set(input.name, input.value)
                } else if (input.value === "") {
                    url.searchParams.delete(input.name)
                }
            });
            window.history.pushState({}, '', url);
            window.location.href = url
        })
    </script>
</x-layouts.app-layout>
