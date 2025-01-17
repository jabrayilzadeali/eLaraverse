@props(['title'])
<x-layouts.app-layout>
    <div class="grid gap-3 md:grid-cols-2 md:grid-rows-[repeat(3, auto)]">
        <div class="row-start-2 md:row-span-2 md:row-start-auto">
            <x-img :img_path="$product->img_path" class="w-full"></x-img>
        </div>
        <div
            class="grid md:flex-col justify-between grid-cols-3 grid-rows-[repeat(3, auto)] gap-4 md:flex md:grid-cols-1">
            <p class="text-zinc-200 auto-cols-min">{{ $product->user->username }}</p>
            <h2
                class="col-span-3 row-start-2 font-semibold text-white md:grid-cols-auto md:grid-rows-auto md:font-bold md:text-xl">
                {{ $product->title }}</h2>
            <p class="hidden md:block">{{ $product->description }}</p>
            <x-stars :rating="$product->rating" class="col-start-3 row-start-1 md:grid-cols-auto md:grid-rows-auto"></x-stars>
            @if ($product->is_featured)
                <div class="flex items-center col-span-2 grid-rows-3 gap-3">
                    <p class="p-1 text-sm font-semibold text-black bg-white rounded-md md:text-base w-fit">ELaraverse's
                        <span class="text-orange-800">Choice</span>
                    </p>
                    <p class="text-sm md:text-base text-zinc-300">Overall Pick</p>
                </div>
            @endif
        </div>
        <div class="flex flex-col justify-start gap-3 pt-3 mt-3 border-t border-gray-700 md:col-start-2">
            @csrf
            @if ($product->stock)
            <div data-add-to-cart-in-show class="">
                <input value="1"
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    type="number">
                <button data-id="{{ $product->id }}" data-title="{{ $product->title }}"
                    data-price="{{ $product->price }}" data-img="{{ Storage::url($product->img_path) }}"
                    data-stock="{{ $product->stock }}"
                    class="px-3 py-2 font-bold border-0 rounded-md dark:bg-slate-50 dark:text-black">Add to
                    Cart</button>
            </div>
            @else
                <p>Out of stock</p>
                
            @endif
            <div class="flex items-end gap-3">
                @if ($product->discount)
                    <p class="text-2xl text-red-500">-{{ $product->discount }}%</p>
                @endif
                <p class="text-4xl text-zinc-200">{{ $product->price - $product->price * $product->discount / 100 }}</p>
                <div>
                </div>
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
                    <button class="bg-blue-500 rounded-sm size-6"></button>
                    <button class="bg-red-500 rounded-sm size-6"></button>
                    <button class="bg-green-500 rounded-sm size-6"></button>
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
                            <td class="px-4 py-2">{{ $key}}</td>
                            <td class="px-4 py-2 text-right">{{ $attribute }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <div class="mt-8">
        <h2 class="mb-5 text-2xl font-bold text-gray-200">Reviews</h2>
        <form class="my-5" action="" data-add-comment>
            <x-rating></x-rating>
            <label for="heading" class="">Title</label>
            <input data-comment-title type="text" name="" id="" required
                class="block p-3 dark:text-gray-300 ring-1 ring-gray-500 dark:bg-gray-800">
            <label class="block my-3" for="comment">Comment</label>
            <textarea data-comment-body name="comment" id="comment" required
                class="block p-3 dark:text-gray-300 ring-1 ring-gray-500 dark:bg-gray-800"></textarea>
            <input class="block" type="submit" value="Add Comment">
        </form>
        <div data-comments class="flex flex-col gap-5">
            {{-- @for ($i = 0; $i < 3; $i++)
                <div class="max-w-[60rem]">
                    <div class="flex items-center gap-3">
                        <img class="rounded-full" src="https://placehold.co/50" alt="">
                        <div class="flex flex-col justify-between">
                            <h2 class="pl-1 text-xl font-semibold">John Doe</h2>
                            <x-stars rating="4.8"></x-stars>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold dark:text-gray-300">Pretty much Perfect</h2>
                    <p class="dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam atque
                        itaque nihil! Molestias aspernatur dolore inventore repudiandae ex! Vitae numquam quam quo hic.
                        Quidem non consequatur accusamus voluptatem consequuntur repellat.</p>
                </div>
            @endfor --}}
        </div>
    </div>

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
                            <h2 class="pl-1 text-xl font-semibold">lkjlj</h2>
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

        addCommentForm.addEventListener('submit', (e) => {
            e.preventDefault()
            console.log(formRating.value)
            comments.innerHTML += createComment(
                'https://placehold.co/50',
                +formRating.value,
                commentTitle.value,
                commentBody.value
            )
        })
    </script>
    </x-layout>
