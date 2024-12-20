@props(['id', 'img', 'title', 'price', 'quantity'])
<li data-cart-id="{{ $id }}" class="flex py-6">
    <div
        class="overflow-hidden border border-gray-200 rounded-md size-24 shrink-0">
        <img src="{{ $img }}"
            alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
            class="object-cover size-full">
    </div>

    <div class="flex flex-col flex-1 ml-4">
        <div>
            <div
                class="flex justify-between text-base font-medium text-gray-900">
                <h3>
                    <a href="#">{{ $title }}</a>
                </h3>
                <p class="ml-4">{{ $price }}</p>
            </div>
            <p class="mt-1 text-sm text-gray-500">Salmon</p>
        </div>
        <div class="flex items-end justify-between flex-1 text-sm">
            <p class="text-gray-500">Qty {{ $quantity }}</p>

            <div class="flex">
                <button data-remove-cart="{{ $id }}" type="button"
                    class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
            </div>
        </div>
    </div>
</li>

{{-- <script>
    const removeCarts = document.querySelectorAll('[data-remove-cart]')
    removeCarts.forEach(removeCart => {
        removeCart.addEventListener('click', () => {
            document.querySelector(`[data-remove-cart=${removeCart.dataset.removeCart}]`).remove()
        })
    });
</script> --}}
