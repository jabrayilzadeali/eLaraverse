<div data-checkout class="relative z-10 hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!--
      Background backdrop, show/hide based on slide-over state.
  
      Entering: "ease-in-out duration-500"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in-out duration-500"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 transition-opacity bg-gray-500/75" aria-hidden="true"></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none">
                <div class="w-screen max-w-md pointer-events-auto">
                    <div class="flex flex-col h-full overflow-y-scroll bg-white shadow-xl dark:bg-zinc-800">
                        <div class="flex-1 px-4 py-6 overflow-y-auto sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-zinc-200" id="slide-over-title">Shopping cart</h2>
                                <div class="flex items-center ml-3 h-7">
                                    <button data-cart-close-btn type="button"
                                        class="relative p-2 -m-2 text-gray-400 hover:text-gray-500">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Close panel</span>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul data-carts role="list" class="-my-6 divide-y divide-gray-200">
                                        {{-- <x-checkout-item img="" title="wow" price="30" quantity="5"></x-checkout-item> --}}
                                        <!-- More products... -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-6 border-t border-gray-200 dark:border-gray-900 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p class="dark:text-gray-300">Subtotal</p>
                                <p>$<span data-total-price class="dark:text-gray-200">262.00</span></p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">
                                <a href="#"
                                    class="flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">Checkout</a>
                            </div>
                            <div class="flex justify-center mt-6 text-sm text-center text-gray-500 dark:text-gray-400">
                                <p>
                                    or
                                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Continue Shopping
                                        <span aria-hidden="true"> &rarr;</span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    console.log('wow')
    window.addEventListener('storage', (e) => {
        if (e.key === 'carts_array') {
            carts_array = localstorage.getItem('carts_array')
            console.log(carts_array)
        }
    })
</script> --}}
