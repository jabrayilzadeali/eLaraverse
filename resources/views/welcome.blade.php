<x-layouts.app-layout>
    <div class="grid grid-cols-2 grid-rows-2 gap-3 mb-5 md:grid-cols-9 lg:grid-cols-12 lg:grid-rows-2">
        <div class="hidden col-span-2 row-span-2 rounded-md lg:block bg-zinc-300/50 dark:text-zinc-200 dark:bg-zinc-700">
            <ul class="flex flex-col gap-5 p-3">
                <li class="relative group">
                    <a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Texnalogiya</a>
                    <div
                        class="absolute z-50 hidden pl-5 min-w-[30rem] bg-transparent group-hover:block -top-3 left-full">
                        <div
                            class="grid grid-cols-3 grid-rows-3 gap-5 px-5 py-4 rounded-md bg-zinc-200 dark:bg-zinc-600">
                            <div>
                                <h2 class="font-bold text-md min-w-28">Test lorem</h2>
                                <ul>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="font-bold text-md min-w-28">Test 2</h2>
                                <ul>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="font-bold text-md min-w-28">Test 2</h2>
                                <ul>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="font-bold text-md min-w-28">Test 2</h2>
                                <ul>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="font-bold text-md min-w-28">Test 2</h2>
                                <ul>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="font-bold text-md min-w-28">Test 2</h2>
                                <ul>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                    <li><a href="#">Test</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Geyimlər</a></li>
                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Kozmetik</a></li>
                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Mebel</a></li>
                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Sağlamlıq</a></li>
                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Uşaq geyimləri və
                        oyuncaqları</a>
                </li>
                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Kitablar</a></li>
                <li><a href="#" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">Bütün
                        Kategoriyalar</a></li>
            </ul>
        </div>
        <div
            class="col-span-2 rounded-md swiper mySwiper2 md:col-span-5 lg:col-span-6 md:row-span-2 backdrop-blur-md h-72 md:h-full lg:h-full">
            <div class="swiper-wrapper">
                @foreach ($featuredProducts as $featuredProduct)
                    <div
                        class="z-10 bg-center bg-cover rounded-md swiper-slide backdrop-blur-md h-72 lg:h-auto" style="background-image: url('{{ $featuredProduct->img_path }}')">
                        <div
                            class="absolute bottom-0 p-3 text-black rounded-md bg-zinc-200/90 dark:bg-zinc-500/90 md:left-5 md:right-5 md:bottom-5">
                            <h1 class="font-bold text-md md:text-xl">{{ $featuredProduct->title }}</h1>
                            <p class="">
                                <span class="text-sm font-semibold text-red-500 line-through">1200$</span>
                                <span class="text-xl font-semibold">{{ $featuredProduct->price }}$</span>
                                <span class="font-semibold text-md">-50%</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div
            class="col-span-2 md:col-span-5 lg:col-span-6 md:row-span-2 rounded-md backdrop-blur-md h-72 md:h-full lg:h-auto bg-[url('https://picsum.photos/id/0/500/400')] bg-cover bg-center">
            <div
                class="absolute bottom-0 p-3 text-black rounded-md bg-zinc-200/90 dark:bg-zinc-500/90 md:left-5 md:right-5 md:bottom-5">
                <h1 class="font-bold text-md md:text-xl">Macbook Pro | 16gb | m4 max</h1>
                <p class="">
                    <span class="text-sm font-semibold text-red-500 line-through">1200$</span>
                    <span class="text-xl font-semibold">700$</span>
                    <span class="font-semibold text-md">-50%</span>
                </p>
            </div>
        </div> --}}
        <div
            class="grid col-span-2 row-span-1 rounded-md place-content-center bg-zinc-300/80 dark:bg-zinc-700 md:col-span-4 h-50 md:h-auto">
            <div class="flex items-end justify-center gap-5 px-3">
                <div>
                    <h1 class="">Cactus</h1>
                    <p class="pb-3">
                        <span class="text-sm font-semibold text-red-500 line-through">1200$</span>
                        <span class="text-xl font-semibold">700$</span>
                        <span class="font-semibold text-md">-50%</span>
                    </p>
                </div>
                <img class="rounded-md" src="https://picsum.photos/id/248/150" alt="">
            </div>
        </div>
        <div
            class="grid row-span-1 px-2 pt-5 rounded-md place-content-center bg-zinc-300/80 dark:bg-zinc-700 md:col-span-2">
            <img class="mb-3 rounded-md" src="https://picsum.photos/id/250/150" alt="">
            <div>
                <h1 class="">Camera</h1>
                <p class="pb-3">
                    <span class="text-sm font-semibold text-red-500 line-through">1200$</span>
                    <span class="text-xl font-semibold">700$</span>
                    <span class="font-semibold text-md">-50%</span>
                </p>
            </div>
        </div>
        <div
            class="flex items-center justify-center row-span-1 text-xl rounded-md bg-zinc-300/80 dark:bg-zinc-700 md:col-span-2">
            <a href="{{ route('products.index') }}">All Products</a>
        </div>
    </div>

    <div class="swiper mySwiper">
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
    </div>

    <div class="my-20">
        <h2 class="mb-8 text-4xl font-bold text-center">Why Choose Us</h2>
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            <div class="flex flex-col items-center justify-between gap-20 px-16 py-10 text-center bg-black rounded-md">
                <h2 class="text-2xl font-bold text-white">Lorem, ipsum dolor</h2>
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere tempora in magni reiciendis, sequi vel fugiat eligendi sapiente placeat esse quis perferendis ratione sed illum?</p>
            </div>
            <div class="flex flex-col items-center justify-between gap-20 px-16 py-10 text-center bg-black rounded-md">
                <h2 class="text-2xl font-bold text-white">Lorem, ipsum dolor</h2>
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere tempora in magni reiciendis, sequi vel fugiat eligendi sapiente placeat esse quis perferendis ratione sed illum?</p>
            </div>
            <div class="flex flex-col items-center justify-between gap-20 px-16 py-10 text-center bg-black rounded-md">
                <h2 class="text-2xl font-bold text-white">Lorem, ipsum dolor</h2>
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere tempora in magni reiciendis, sequi vel fugiat eligendi sapiente placeat esse quis perferendis ratione sed illum?</p>
            </div>
        </div>
    </div>

    <div class="z-50 flex gap-5 mt-20 mb-8">
        <button class="p-3 font-bold text-gray-200 bg-gray-800 rounded-md" data-new-items>Yeni Məhsullar</button>
        <button class="p-3 text-gray-700 border border-gray-400 rounded-md dark:text-gray-300"
            data-discounted-items>Endirimli Məhsullar</button>
        <button class="p-3 text-gray-700 border border-gray-400 rounded-md dark:text-gray-300"
            data-most-watched-items>Çox Baxılanlar</button>
    </div>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach ($latestProducts as $latestProduct)
            <x-product-item :id="$latestProduct->id" :slug="route('products.show', $latestProduct->slug)" :img="$latestProduct->img_path" :title="$latestProduct->title" :rating="$latestProduct->rating"
                :price="$latestProduct->price" :previousPrice="$latestProduct->price * 2"></x-product-item>
        @endforeach
    </div>

    <style>
        .swiper {
            width: 100%;
            max-width: 1216px;
            margin: auto;
        }

        /* .swiper-slide > img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        } */
    </style>
</x-layouts.app-layout>
