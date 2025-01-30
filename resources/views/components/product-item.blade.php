@props([
    'id',
    'slug',
    'img' => 'https://picsum.photos/seed/picsum/200/300',
    'title',
    'rating' => 3.2,
    'price',
    'discount' => 0,
    'discounted_price' => 0,
    'stock' => 0,
    'inWishlist' => 0
])
<div class="transition-all duration-300 ease-in-out group hover:-translate-y-5">
    <a href="{{ $slug }}">
        <x-img :img_path="$img"
            class="mb-4 aspect-square w-full rounded-lg transition-all ease-in-out bg-gray-200 object-cover group-hover:opacity-85 xl:aspect-[7/8]"></x-img>
        <x-stars :rating="$rating"></x-stars>
        <h3
            class="my-2 text-sm text-gray-700 transition-all ease-in-out dark:text-gray-100 hover:text-gray-300 line-clamp-2">
            {{ $title }}</h3>
    </a>
    <div class="flex items-center justify-between">
        <div>
            <p class="text-xl">${{ $discount > 0 ? $price - ($price * $discount) / 100 : $price }}</p>
            @if ($discount)
                <p class="text-base line-through">${{ $price }}</p>
                <p class="text-base text-red-500">${{ $discount }}%</p>
            @endif
        </div>
        <div class="flex flex-col items-end justify-end gap-3">
            @auth
                <form data-wishlist-toggle action="{{ route('wishlist.toggle') }}" method="POST">
                    <input type="hidden" name="product_id" value="{{ $id }}">
                    @csrf
                    <button data-wishlist-btn="{{ $id }}">
                        <x-in-wishlist :inWishlist="$inWishlist"></x-in-wishlist>
                        {{-- @if ($inWishlist)
                            <x-icons.heart-full></x-icons.heart-full>
                        @else
                            <x-icons.heart></x-icons.heart>
                        @endif --}}
                    </button>
                </form>
            @endauth
            @if ($stock)
                <button data-add-to-cart data-id="{{ $id }}" data-img="{{ $img }}"
                    data-title="{{ $title }}" data-price="{{ $price }}" data-discount="{{ $discount }}"
                    data-discounted-price="{{ $price - ($price * $discount) / 100 }}" data-quantity="1"
                    data-stock="{{ $stock }}"
                    class="px-3 py-2 text-sm text-black bg-white rounded-md disabled:bg-slate-300">Add To Cart</button>
                <button data-remove-from-cart data-id="{{ $id }}" data-img="{{ $img }}"
                    data-title="{{ $title }}" data-price="{{ $price }}"
                    class="hidden px-3 py-2 text-sm text-black bg-white rounded-md disabled:bg-slate-300">Remove From
                    Cart</button>
            @else
                <p>Out of stock</p>
            @endif
        </div>
    </div>
</div>