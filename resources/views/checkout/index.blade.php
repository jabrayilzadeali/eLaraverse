<x-layouts.app-layout>
    @if (Session::has('message'))
        <div class="">
            {{ Session::get('message') }}
        </div>
    @endif

    <div data-carts-checkout></div>
    <p data-not-in-cart-checkout>Please <a class="underline dark:text-white" href="{{ route('products.index') }}">add
            items</a> to cart to continue</p>
    <form data-form-checkout action="/checkout" method="POST">
        @csrf
        <p>Your Balance: <span data-user-balance>{{ Auth::user()->balance }}</span></p>
        <p>Total: <span data-total-price></span></p>
        <h2 class="pb-5 text-4xl">Purchase all of them</h2>
        <p data-has-not-balance>You don't have enough balance</p>
        <div data-has-balance>
            <button class="px-2 py-1 text-black bg-green-500 rounded-md">Yes</button>
            <a href="/" class="text-white">Cancel</a>
        </div>
    </form>
</x-layouts.app-layout>
