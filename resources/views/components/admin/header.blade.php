<div class="flex items-center justify-between px-5 mt-10 mb-3">
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
    <div>
        <button class="flex items-center justify-center gap-2 px-4 py-1 bg-blue-600 rounded-lg text-neutral-300">
            <x-icons.plus></x-icons.plus>
            <a href="{{ route('admin.products.create') }}">Add New Product</a>
        </button>
    </div>
</div>
