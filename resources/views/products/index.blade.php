<x-layout>
    <div class="">
        <div class="">
            <h2 class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                @foreach ($products as $product)
                    <x-product-item :id="$product->id" :slug="route('products.show', $product->slug)" :img="$product->img_path" :title="$product->title" :rating="$product->rating" :price="$product->price" :previousPrice="$product->price * 2"></x-product-item>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
