<x-layouts.app-layout>
    <h1 class="pb-12 text-4xl font-bold">Wishlist</h1>

    <div class="lg:col-span-3">
        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
            @foreach ($wishlist as $item)
                @php
                    $product = $item->product
                @endphp
                <x-product-item :id="$product->id" :slug="route('products.show', $product->slug)" :img="$product->img_path"
                    :title="$product->title" :rating="$product->rating" :price="$product->price" :discounted_price="$product->discounted_price" :stock="$product->stock"
                    :discount="$product->discount"></x-product-item>
            @endforeach
        </div>
        <div class="mt-10">
            {{ $wishlist->links() }}
        </div>
    </div>
</x-layouts.app-layout>