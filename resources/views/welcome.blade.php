<x-layout>

    <h1 class="text-4xl font-bold text-center">Welcome to Elaraverse</h1>
    <div class="pt-3 text-center max-w-30">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos accusamus dignissimos possimus.</div>
    {{-- <div class="">
        <div class="mt-10">
            <h2 class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            </div>
        </div>
    </div> --}}

    <style>
        .swiper {
            width: 100%;
            max-width: 600px;
            padding-top: 50px;
            padding-bottom: 50px;
            overflow: hidden;
            /* Hide left side overflow */
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 400px;
            height: 500px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
        }
    </style>
    </head>

    <body>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                {{-- @foreach ($products as $product)
                    <div class="swiper-slide">
                        <x-product-item :id="$product->id" :slug="route('products.show', $product->slug)" :img="$product->img_path" :title="$product->title"
                            :rating="$product->rating" :price="$product->price" :previousPrice="$product->price * 2"></x-product-item>
                    </div>
                @endforeach --}}
                <div class="swiper-slide">
                    <x-product-item :id="1" :slug="route('products.show', 1)" title="title"
                        price="300" :rating="4.2" previousPrice="600"></x-product-item>
                </div>
                <div class="swiper-slide">
                    <x-product-item :id="2" :slug="route('products.show', 2)" title="title 2"
                        price="300" :rating="3" previousPrice="600"></x-product-item>
                </div>
                <div class="swiper-slide">
                    <x-product-item :id="3" :slug="route('products.show', 2)" title="title 3"
                        price="300" :rating="5" previousPrice="600"></x-product-item>
                </div>
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

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                startingSlide: 2,
                slidesPerView: 2, // Show center and right slides only
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                },
            });
        </script>
</x-layout>
