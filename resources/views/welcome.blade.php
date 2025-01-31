<x-layouts.app-layout>
    <div class="grid grid-cols-2 gap-3 mb-5 md:grid-cols-9">
        <div class="hidden col-span-2 rounded-md md:block bg-zinc-300/50 dark:text-zinc-200 dark:bg-zinc-700">
            <ul class="flex flex-col gap-5 p-3">
                @foreach ($categories as $category)
                    <x-category-home :category="$category"></x-category-home>
                @endforeach

                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Bütün
                        Kategoriyalar</a></li>
            </ul>
        </div>
        <div class="col-span-7 dark:bg-zinc-500/50 bg-zinc-300/50">

            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    @foreach ($featuredProducts as $featuredProduct)
                        <div class="swiper-slide">
                            <div class="flex flex-col justify-around p-5 md:items-center md:flex-row">
                                <div class="flex flex-col justify-center gap-5 md:flex-row md:items-center">
                                    <div class="flex flex-col gap-3 max-w-96">
                                        <a href="{{ route('products.show', $featuredProduct->slug) }}"
                                            class="block font-bold text-md hover:underline md:text-4xl">{{ $featuredProduct->title }}
                                        </a>
                                        <p class="text-sm">{{ $featuredProduct->description }}</p>
                                        <p class="">
                                            @if ($featuredProduct->discount)
                                                <span
                                                    class="text-sm font-semibold text-red-500 line-through">{{ $featuredProduct->price }}$</span>
                                            @endif
                                            <span
                                                class="text-xl font-semibold">{{ $featuredProduct->price - ($featuredProduct->price * $featuredProduct->discount) / 100 }}</span>
                                            @if ($featuredProduct->discount)
                                                <span
                                                    class="font-semibold text-md">{{ $featuredProduct->discount }}%</span>
                                            @endif
                                        </p>
                                        @if ($featuredProduct->stock)
                                            <div>
                                                <button data-add-to-cart data-id="{{ $featuredProduct->id }}"
                                                    data-img="{{ $featuredProduct->img_path }}"
                                                    data-title="{{ $featuredProduct->title }}"
                                                    data-price="{{ $featuredProduct->price }}"
                                                    data-discounted-price="{{ $featuredProduct->price - ($featuredProduct->price * $featuredProduct->discount) / 100 }}"
                                                    data-quantity="1" data-stock="{{ $featuredProduct->stock }}"
                                                    class="px-3 py-2 rounded-md dark:bg-zinc-900 text-neutral-200">Add
                                                    To Cart</button>

                                                <button data-remove-from-cart data-id="{{ $featuredProduct->id }}"
                                                    data-img="{{ $featuredProduct->img }}"
                                                    data-title="{{ $featuredProduct->title }}"
                                                    data-price="{{ $featuredProduct->price }}"
                                                    class="hidden px-3 py-2 rounded-md dark:bg-zinc-900 text-neutral-200">Remove
                                                    From
                                                    Cart</button>
                                            </div>
                                        @else
                                            <div>
                                                <p>Out of stock</p>
                                                <span class="font-semibold text-md">-50%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="py-10">
                                        <img class="rounded-md max-w-96 max-h-96"
                                            src="{{ Storage::url($featuredProduct->img_path) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/1/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/2/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/3/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/4/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/5/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/6/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/7/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/8/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/9/100/100"
                    alt=""></div>
            <div class="swiper-slide"><img class="w-full h-auto rounded-md" src="https://picsum.photos/id/10/100/100"
                    alt=""></div>
        </div>
        <div class="swiper-pagination"></div>
    </div> --}}

    <div class="z-50 flex gap-5 mt-20 mb-8">
        <button class="p-3 font-bold text-gray-200 bg-gray-800 rounded-md" data-new-items>Yeni Məhsullar</button>
        <button class="p-3 text-gray-700 border border-gray-400 rounded-md dark:text-gray-300"
            data-discounted-items>Endirimli Məhsullar</button>
        {{-- <button class="p-3 text-gray-700 border border-gray-400 rounded-md dark:text-gray-300"
            data-most-watched-items>Çox Baxılanlar</button> --}}
    </div>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach ($latestProducts as $latestProduct)
            <x-product-item :id="$latestProduct->id" :slug="route('products.show', $latestProduct->slug)" :img="$latestProduct->img_path" :title="$latestProduct->title" :rating="$latestProduct->rating"
                :stock="$latestProduct->stock" :price="$latestProduct->price" :discount="$latestProduct->discount" :discounted_price="$latestProduct->discountedPrice"
                :inWishlist="$latestProduct->inWishlist"></x-product-item>
        @endforeach
    </div>

    <style>
        .swiper {
            width: 100%;
            max-width: 1216px;
            margin: auto;
        }
    </style>
</x-layouts.app-layout>
