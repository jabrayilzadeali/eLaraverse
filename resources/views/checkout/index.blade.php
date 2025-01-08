<x-layouts.app-layout>
<div class="grid h-full place-content-center">
    <form action="/checkout" method="POST">
        @csrf
        <p>Your Balance: <span>{{ Auth::user()->balance }}</span></p>
        <p>Total: <span data-total-price></span></p>
        <h2 class="pb-5 text-4xl">Purchase all of them</h2>
        <button class="px-2 py-1 text-black bg-green-500 rounded-md">Yes</button>
        <a href="/" class="text-white">Cancel</a>
    </form>
</div>
</x-layouts.app-layout>