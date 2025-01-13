<x-layouts.admin-layout>
    <div class="flex items-center justify-between px-5 mt-10 mb-3">
        <div class="flex items-center justify-center gap-5">
            <div class="relative">
                <button data-filter-btn
                    class="flex items-center justify-center gap-2 px-4 py-1 border rounded-lg text-neutral-300 border-neutral-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M4 0v7.268a2 2 0 1 1-2 0V0zm0 12v4H2v-4zm5-9.732V0H7v2.268a2 2 0 1 0 2 0M9 16V7H7v9zm5-8.732V0h-2v7.268a2 2 0 1 0 2 0M14 16v-4h-2v4z" />
                    </svg>
                    <span>Filter</span>
                </button>
                <dialog data-dialog class="absolute p-5 mt-3 rounded-md position dark:bg-neutral-900 ring-2 ring-white">
                    <form class="flex flex-col gap-5">
                        <div>
                            <label for="sellers"
                                class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">Select
                                User</label>
                            <select data-user id="sellers" name="user_id"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md dark:bg-neutral-800 dark:text-neutral-200 py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option value="">not Selected</option>
                                @foreach ($sellers as $seller)
                                    <option {{ +request('user_id') === +$seller->id ? 'selected' : '' }}
                                        value="{{ $seller->id }}">{{ $seller->username }}</option>
                                @endforeach
                            </select>
                        </div>
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
                <dialog data-stacks class="absolute p-5 mt-3 rounded-md w-44 position dark:bg-neutral-900 ring-2 ring-white">
                    <h3 class="text-lg text-neutral-100">Hide columns</h3>
                        <form action=""></form>
                        @foreach ($stackedColumns as $column)
                            <div>
                                <input data-hide-column={{ $column }} id="{{ $column }}" type="checkbox" {{ !in_array($column, array_column($columns, 'label')) ? 'checked' : '' }}>
                                <label class="text-neutral-300" for="{{ $column }}">{{ $column }}</label>
                            </div>
                        @endforeach
                </dialog>
            </div>

            <div class="relative m-[2px] mr-5 float-left">
                <form data-search-form>
                    <label for="inputSearch" class="sr-only">Search</label>
                    <input id="inputSearch" data-search value="{{ old('search', request('search')) }}" name="search"
                        type="text" placeholder="Search..."
                        class="block w-64 py-2 pl-10 pr-4 text-sm border rounded-lg dark:border-none dark:bg-neutral-600 focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400" />
                    <span class="absolute transform -translate-y-1/2 pointer-events-none left-3 top-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 text-neutral-500 dark:text-neutral-200">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                </form>
            </div>
        </div>
        <div>
            <button class="flex items-center justify-center gap-2 px-4 py-1 bg-blue-600 rounded-lg text-neutral-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
                </svg>
                <a href="{{ route('admin.products.create') }}">Add New Product</a>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full overflow-x-scroll table-auto dark:border-neutral-700">
            <thead>
                <tr class="pt-3 text-sm border-b dark:border-neutral-700 text-neutral-300">
                    @foreach ($columns as $column)
                        @if ($column['sortable'])
                            <x-table.th hasSorting="{{ $column['sortable'] }}" :sorts="$sorts" :sortQuery="$column['key']">
                                {{ $column['label'] }}
                            </x-table.th>
                        @else
                            <x-table.th>{{ $column['label'] }}</x-table.th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="dark:hover:bg-neutral-800/50">
                        @foreach ($columns as $column)
                            @php
                                $value = data_get($product, $column['key']); // Safely access nested properties
                            @endphp
                            @if ($column['type'] === 'rating')
                                <x-table.td>
                                    <x-stars class="block" :rating="$value"></x-stars>
                                </x-table.td>
                            @elseif ($column['type'] === 'img')
                                <x-table.td>
                                    <x-img :img_path="$value"></x-img>
                                </x-table.td>
                            @elseif ($column['type'] === 'boolean')
                                <x-table.td>{{ $value ? 'true' : 'false' }}</x-table.td>
                            @elseif ($column['type'] === 'date')
                                <x-table.td>{{ $value->format('d.m.Y') }}</x-table.td>
                            @else
                                <x-table.td>{{ $value }}</x-table.td>
                            @endif
                        @endforeach
                        {{-- <td class="flex items-center justify-center h-full gap-2 px-4 py-2">
                            <a href="{{ route('admin.products.edit', $product->slug) }}"
                                class="block px-1 py-1 font-semibold bg-green-500 rounded-md text-neutral-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-2 2v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                                </svg>
                            </a>
                            <dialog data-modal
                                class="absolute z-50 p-5 rounded-md dark:bg-neutral-800 dark:text-neutral-300">
                                <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <p>Are you Sure You wanted to delete?</p>
                                    <button data-close-modal type="button">Close</button>
                                    <button
                                        class="px-1 py-1 font-semibold bg-red-500 rounded-md text-neutral-700 dark:text-neutral-100"
                                        autofocus>Yes</button>
                                </form>
                            </dialog>
                            <button data-show-modal
                                class="px-1 py-1 font-semibold bg-red-500 rounded-md text-neutral-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                                </svg>
                            </button>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const modal = document.querySelector("[data-modal]");
        const showModalBtns = document.querySelectorAll("[data-show-modal]");
        const closeModalBtns = document.querySelectorAll("[data-close-modal]");
        const filterBtn = document.querySelector("[data-filter-btn]");
        const dialog = document.querySelector("[data-dialog]");
        const filterForm = document.querySelector("[data-dialog] form");
        const searchForm = document.querySelector("[data-search-form]");
        const searchInput = document.querySelector('[data-search]')
        const iconUpDownArrow = document.querySelector('[data-icon-up-down-arrow]')
        const iconUpArrow = document.querySelector('[data-icon-up-arrow]')
        const iconDownArrow = document.querySelector('[data-icon-down-arrow]')
        const stackBtn = document.querySelector('[data-stack-btn]')
        const stacks = document.querySelector('[data-stacks]')
        const hideColumnElements = document.querySelectorAll('[data-hide-column]')
        stackBtn.addEventListener('click', () => {
            if (stacks.open) {
                stacks.close()
            } else {
                stacks.show()
            }
        })
        
        hideColumnElements.forEach(el => {
            el.addEventListener('click', (event) => {
                event.preventDefault()
                console.log(el, el.checked)
                if (el.checked) {
                    setUrlParam(`hiddenColumns[]`, el.dataset.hideColumn)
                } else {
                    removeHiddenColumn(el.dataset.hideColumn)
                    // deleteUrlParam('hiddenColumns[]')
                }
            })
            
        });


        function setUrlParam(key, value) {
            const urlParams = new URLSearchParams(window.location.search);
            // urlParams.set(key, value);
            if (key.endsWith('[]')) {
                const existingValues = urlParams.getAll(key);
                if (!existingValues.includes(value)) {
                    urlParams.append(key, value); // Add only if it doesn't already exist
                }
            } else {
                urlParams.set(key, value); // Overwrite for non-array keys
            }
            const url = window.location.href.split('?')[0]
            window.location.href = `${url}?${urlParams.toString()}`
        }

        function deleteUrlParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.delete(param);
            const url = window.location.href.split('?')[0]
            window.location.href = `${url}?${urlParams.toString()}`
        }
        
        function removeHiddenColumn(columnToRemove) {
            const urlParams = new URLSearchParams(window.location.search);

            // Get all `hiddenColumns` values as an array
            const hiddenColumns = urlParams.getAll('hiddenColumns[]');

            // Clear all `hiddenColumns[]` parameters
            urlParams.delete('hiddenColumns[]');

            // Re-add only the columns that should remain
            hiddenColumns.forEach(column => {
                if (column !== columnToRemove) {
                    urlParams.append('hiddenColumns[]', column);
                }
            });

            // Update the URL
            const url = window.location.href.split('?')[0];
            window.location.href = `${url}?${urlParams.toString()}`;
        }

        const icons = document.querySelectorAll('[data-icons]')
        icons.forEach(i => {
            const iconUpDownArrow = i.querySelector('[data-icon-up-down-arrow]')
            const iconUpArrow = i.querySelector('[data-icon-up-arrow]')
            const iconDownArrow = i.querySelector('[data-icon-down-arrow]')

            iconUpDownArrow.addEventListener('click', () => {
                iconUpDownArrow.classList.toggle('hidden')
                iconUpArrow.classList.toggle('hidden')
                setUrlParam(`sort[${i.dataset.icons}]`, 'asc')
            })

            iconUpArrow.addEventListener('click', () => {
                iconUpArrow.classList.toggle('hidden')
                iconDownArrow.classList.toggle('hidden')
                setUrlParam(`sort[${i.dataset.icons}]`, 'desc')
            })

            iconDownArrow.addEventListener('click', () => {
                iconDownArrow.classList.toggle('hidden')
                iconUpDownArrow.classList.toggle('hidden')
                deleteUrlParam(`sort[${i.dataset.icons}]`);
            })
        })


        // "Show the dialog" button opens the dialog modally
        showModalBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                modal.showModal();
            })
        });

        // "Close" button closes the dialog
        closeModalBtns.forEach(closeBtn => {
            closeBtn.addEventListener("click", () => {
                modal.close();
            })
        })

        filterBtn.addEventListener('click', () => {
            if (dialog.open) {
                dialog.close()
            } else {
                dialog.show()
            }
        })

        searchForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('search', searchInput.value)
            const url = window.location.href.split('?')[0]
            window.location.href = `${url}?${urlParams.toString()}`
        })

        filterForm.addEventListener('submit', (e) => {
            e.preventDefault()
            const urlParams = new URLSearchParams(window.location.search);
            const select = document.querySelector('[data-user]')
            if (select.value.trim() && select.value !== "") {
                urlParams.set('user_id', select.value)
            } else if (select.value === "") {
                urlParams.delete('user_id')
            }
            const inputs = filterForm.querySelectorAll("input[type='number']")
            inputs.forEach(input => {
                if (input.value.trim() && input.value !== "") {
                    urlParams.set(input.name, input.value)
                } else if (input.value === "") {
                    urlParams.delete(input.name)
                }
            });
            const url = window.location.href.split('?')[0]
            window.location.href = `${url}?${urlParams.toString()}`
        })
    </script>
</x-layouts.admin-layout>
