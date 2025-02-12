@props(['title'])
<x-layouts.app-layout>
    <div class="grid gap-3 md:grid-cols-2 md:grid-rows-[repeat(3, auto)]">
        <div class="row-start-2 md:row-span-2 md:row-start-auto">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <x-img :img_path="$product->img_path" class="w-full"></x-img>
                    </div>
                    <div class="swiper-slide">
                        <x-img :img_path="$product->img_path" class="w-full"></x-img>
                    </div>
                    <div class="swiper-slide">
                        <x-img :img_path="$product->img_path" class="w-full"></x-img>
                    </div>
                </div>
                <!-- Pagination for second Swiper -->
                <div class="swiper-pagination-2"></div>
            </div>
            {{-- <x-img :img_path="$product->img_path" class="w-full"></x-img> --}}
        </div>
        <div
            class="grid md:flex-col justify-between grid-cols-3 grid-rows-[repeat(3, auto)] gap-4 md:flex md:grid-cols-1">
            {{-- {{ $product->user }} --}}
            <a href="{{ route('sellers.seller_products', $product->seller) }}"
                class="text-zinc-800 dark:text-zinc-200 auto-cols-min hover:underline">{{ $product->seller->username }}</a>
            <h2
                class="col-span-3 row-start-2 font-semibold text-black dark:text-white md:grid-cols-auto md:grid-rows-auto md:font-bold md:text-xl">
                {{ $product->title }}</h2>
            <p class="hidden md:block">{{ $product->description }}</p>
            <x-stars :rating="$product->rating" class="col-start-3 row-start-1 md:grid-cols-auto md:grid-rows-auto"></x-stars>
            @if ($product->is_featured)
                <div class="flex items-center col-span-2 grid-rows-3 gap-3">
                    <p class="p-1 text-sm font-semibold text-black bg-white rounded-md md:text-base w-fit">ELaraverse's
                        <span class="text-orange-800">Choice</span>
                    </p>
                    <p class="text-sm md:text-base text-zinc-600 dark:text-zinc-300">Overall Pick</p>
                </div>
            @endif
        </div>
        <div class="flex flex-col justify-start gap-3 pt-3 mt-3 border-t border-gray-700 md:col-start-2">
            @csrf
            @if ($product->stock)
                <div data-add-to-cart-in-show class="">
                    {{-- <input value="1"
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    type="number"> --}}
                    <select id="quantity" name="quantity"
                        class="appearance-none w-40 rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        @for ($i = 1; $i < 15; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>

                    <button data-id="{{ $product->id }}" data-img="{{ $product->img_path }}"
                        data-title="{{ $product->title }}" data-price="{{ $product->price }}"
                        data-discount="{{ $product->discount }}"
                        data-discounted-price="{{ $product->price - ($product->price * $product->discount) / 100 }}"
                        data-stock="{{ $product->stock }}"
                        class="px-3 py-2 font-bold border-0 rounded-md dark:bg-slate-50 dark:text-black">Add to
                        Cart</button>
                    {{-- <button data-id="{{ $id }}" data-img="{{ $img }}"
                        data-title="{{ $title }}" data-price="{{ $price }}" data-discount="{{ $discount }}"
                        data-discounted-price="{{ $price - ($price * $discount) / 100 }}" data-quantity="1"
                        data-stock="{{ $stock }}"
                        class="px-3 py-2 text-sm text-black bg-white rounded-md disabled:bg-slate-300">Add To Cart</button> --}}



                    {{-- <button data-add-to-cart data-id="{{ $product->id }}" data-img="{{ $img }}"
                    data-title="{{ $title }}" data-price="{{ $price }}" data-discount="{{ $discount }}"
                    data-discounted-price="{{ $price - ($price * $discount) / 100 }}" data-quantity="1"
                    data-stock="{{ $stock }}"
                    class="px-3 py-2 text-sm text-black bg-white rounded-md disabled:bg-slate-300">Add To Cart</button> --}}
                </div>
            @else
                <p>Out of stock</p>
            @endif
            <div class="flex items-end gap-3">
                @if ($product->discount)
                    <p class="text-2xl text-red-500">-{{ $product->discount }}%</p>
                @endif
                <p class="text-4xl text-zinc-800 dark:text-zinc-200">{{ $product->price - ($product->price * $product->discount) / 100 }}
                </p>
            </div>
            @if ($product->discount)
                <p>
                    Previous price:
                    <span class="line-through">{{ $product->price }}</span>
                </p>
            @endif
            <p class="md:hidden">{{ $product->description }}</p>
            {{-- <div class="flex items-end gap-5">
                <p class="text-2xl">Select Color:</p>
                <div class="flex gap-3">
                    <button class="bg-blue-500 rounded-xs size-6"></button>
                    <button class="bg-red-500 rounded-xs size-6"></button>
                    <button class="bg-green-500 rounded-xs size-6"></button>
                </div>
            </div> --}}
        </div>
    </div>
    @if ($product->attributes)
        <div class="my-4">
            <h2 class="mb-5 text-2xl font-bold text-gray-200">Products Information</h2>
            <table class="min-w-full border-separate table-auto border-spacing-0 dark:bg-neutral-800">
                <tbody class="">
                    @foreach (json_decode($product->attributes) as $key => $attribute)
                        <tr class="my-2">
                            <td class="px-4 py-2">{{ $key }}</td>
                            <td class="px-4 py-2 text-right">{{ $attribute }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <div class="mt-8">
        <h2 class="mb-5 text-2xl font-bold text-gray-200">Reviews</h2>
        @auth
            @if ($hasPurchased)
                <form class="my-5" method="POST" action="{{ route('review.store') }}" data-add-comment>
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    @error('product_id')
                        {{ $message }}
                    @enderror
                    <x-rating></x-rating>
                    <label for="heading" class="">Title</label>
                    <input data-comment-title type="text" name="title" id="" required
                        class="block px-2 py-1 dark:text-gray-300 ring-1 ring-gray-500 dark:bg-transparent">
                    @error('title')
                        {{ $message }}
                    @enderror
                    <label class="block my-3" for="comment">Comment</label>
                    <textarea data-comment-body name="comment" id="comment" required
                        class="block p-3 max-w-96 dark:text-gray-300 ring-1 ring-gray-500 dark:bg-transparent"></textarea>
                    @error('comment')
                        {{ $message }}
                    @enderror
                    <input class="block px-2 py-1 mt-5 font-semibold rounded-md bg-fuchsia-600 dark:text-white"
                        type="submit" value="Add Comment">
                </form>
            @endif
        @endauth
        <div data-comments class="flex flex-col gap-5">
            @forelse ($reviews as $review)
                <div class="max-w-[60rem]">
                    <div class="flex items-center gap-3">
                        <img class="rounded-full" src="{{ $review->user->img_path }}" alt="">
                        <div class="flex flex-col justify-between">
                            <h2 class="pl-1 text-xl font-semibold">{{ $review->user->username }}</h2>
                            <div class="flex items-end text-orange-500">
                                <x-stars :rating="$review->rating"></x-stars>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold dark:text-gray-300">{{ $review->title }}</h2>
                    <p class="dark:text-gray-400">{{ $review->comment }}</p>
                </div>
            @empty
                no Review
            @endforelse
        </div>
    </div>

    <style>
        .swiper-pagination {
            display: block !important;
        }
    </style>

    <script>
        function generateStars(rating) {
            let starsHtml = '';
            const fullStars = Math.floor(rating); // Integer part
            const halfStar = rating % 1 !== 0; // Check if it's a half star
            const emptyStars = 5 - Math.ceil(rating); // Empty stars to make up 5 total

            // Full stars
            for (let i = 0; i < fullStars; i++) {
                starsHtml += `<x-icons.full-star></x-icons.full-star>`;
            }
            // Half star
            if (halfStar) {
                starsHtml += `<x-icons.half-star></x-icons.half-star>`;
            }
            // Empty stars
            for (let i = 0; i < emptyStars; i++) {
                starsHtml += `<x-icons.empty-star></x-icons.empty-star>`;
            }
            return starsHtml;
        }

        function createComment(img, rating, commentTitle, commentBody) {
            return `
                <div class="max-w-[60rem]">
                    <div class="flex items-center gap-3">
                        <img class="rounded-full" src="${img}" alt="">
                        <div class="flex flex-col justify-between">
                            <h2 class="pl-1 text-xl font-semibold">${authenticatedUser.username}</h2>
                            <div class="flex items-end text-orange-500">
                                ${generateStars(rating)}
                            </div>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold dark:text-gray-300">${commentTitle}</h2>
                    <p class="dark:text-gray-400">${commentBody}</p>
                </div>
            `
        }

        // console.log('usersName: ', authenticatedUserName)
        const addCommentForm = document.querySelector('[data-add-comment]')
        const formRating = document.querySelector('[data-input-rating]')
        const commentTitle = document.querySelector('[data-comment-title]')
        const commentBody = document.querySelector('[data-comment-body]')
        const comments = document.querySelector('[data-comments]')

        // addCommentForm.addEventListener('submit', (e) => {
        //     e.preventDefault()
        //     console.log(formRating.value)
        //     comments.innerHTML += createComment(
        //         'https://placehold.co/50',
        //         +formRating.value,
        //         commentTitle.value,
        //         commentBody.value
        //     )
        // })
        // var swiper = new Swiper(".mySwiper", {
        //   spaceBetween: 30,
        //   pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        //   },
        // });
    </script>
    </x-layout>
