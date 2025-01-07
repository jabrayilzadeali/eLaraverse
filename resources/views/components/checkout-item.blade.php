@props(['id', 'img', 'title', 'price', 'quantity'])
<li data-cart-id="{{ $id }}" class="flex py-6">
    <div
        class="overflow-hidden border border-gray-200 rounded-md dark:border-gray-800 size-24 shrink-0">
        <img src="{{ $img }}"
            alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
            class="object-cover size-full">
    </div>

    <div class="flex flex-col flex-1 ml-4">
        <div>
            <div
                class="flex justify-between text-base font-medium text-gray-900 dark:text-gray-100">
                <h3>
                    <a href="#">{{$title}}</a>
                </h3>
                <p class="ml-4">{{$price}}</p>
            </div>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Salmon</p>
        </div>
        <div class="flex items-end justify-between flex-1 text-sm">
            <div class="flex gap-5 text-dark">
                <div data-decrease-quantity="{{$id}}" class="text-black dark:text-gray-300">
                </div>
                <p class="text-gray-500 dark:text-gray-300">Qty {{ $quantity }}</p>
                <div data-increase-quantity="${id}" class="text-black dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"/></svg>
                </div>
            </div>

            <div class="flex">
                <button data-remove-cart="{{$id}}" type="button"
                    class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Remove</button>
            </div>
        </div>
    </div>
</li>