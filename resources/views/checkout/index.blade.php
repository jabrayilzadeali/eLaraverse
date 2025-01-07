<x-layouts.app-layout>
    @foreach ($carts as $cart)
        <x-checkout-item :id="$cart->id" :img="$cart->product->img_path" :title="$cart->product->title" :price="$cart->product->price" :quantity="$cart->quantity"></x-checkout-item>
    @endforeach
</x-layouts.app-layout>