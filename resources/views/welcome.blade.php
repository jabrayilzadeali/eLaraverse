<x-layout>
    <div class="grid grid-cols-2 grid-rows-3 gap-3 md:grid-cols-9 lg:grid-cols-12 lg:grid-rows-2">
        <div class="hidden col-span-2 row-span-2 rounded-md lg:block dark:text-zinc-200 dark:bg-zinc-700">
            <ul class="flex flex-col gap-5 p-3">
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Texnalogiya</a></li>
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Geyimlər</a></li>
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Mebel</a></li>
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Sağlamlıq</a></li>
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Uşaq geyimləri və oyuncaqları</a>
                </li>
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Kitablar</a></li>
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Kitablar</a></li>
                <li><a href="#" class="block p-2 rounded-md dark:bg-zinc-600">Bütün Kategoriyalar</a></li>
            </ul>
        </div>
        <div
            class="col-span-2 md:col-span-5 lg:col-span-6 md:row-span-2 rounded-md backdrop-blur-md h-72 md:h-full lg:h-auto bg-[url('https://picsum.photos/id/0/500/400')] bg-cover bg-center">
            <div
                class="absolute bottom-0 p-3 text-black rounded-md dark:bg-zinc-500/90 md:left-5 md:right-5 md:bottom-5">
                <h1 class="font-bold text-md md:text-xl">Macbook Pro | 16gb | m4 max</h1>
                <p class="">
                    <span class="text-sm font-semibold text-red-500 line-through">1200$</span>
                    <span class="text-xl font-semibold">700$</span>
                    <span class="font-semibold text-md">-50%</span>
                </p>
            </div>
        </div>
        <div
            class="grid col-span-2 row-span-1 rounded-md place-content-center bg-zinc-700 md:col-span-4 h-50 md:h-auto">
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
        <div class="grid row-span-1 px-2 pt-5 rounded-md place-content-center bg-zinc-700 md:col-span-2">
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
        <div class="flex items-center justify-center row-span-1 text-xl rounded-md dark:bg-zinc-700 md:col-span-2">
            All Products
        </div>
    </div>


    <!-- Slider main container -->
    <div>
        <div class="swiper w-[600px] h-[600px]">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                ...
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>

    <style>
        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
        }
    </style>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
            </div>
            <div class="swiper-slide">
                <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</x-layout>
