@props(['title'])
<x-layout>
    @auth
        <div class="flex justify-center gap-3 mb-5">
            <form action="{{ route('products.destroy', $product->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded-md" type="submit" value="Delete">
            </form>
            <a class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded-md" href="{{ route('products.edit', $product->slug) }}">Edit</a>
        </div>
    @endauth
    <div class="grid gap-3 md:grid-cols-2 md:grid-rows-[repeat(3, auto)]">
        <div class="row-start-2 md:row-span-2 md:row-start-auto">
            <img src="{{ Storage::url($product->img_path) }}" alt="">
        </div>
        <div class="grid md:flex-col justify-between grid-cols-3 grid-rows-[repeat(3, auto)] gap-4 md:flex md:grid-cols-1">
            <p class="text-zinc-200 auto-cols-min">Brand Name</p>
            <h2 class="col-span-3 row-start-2 font-semibold text-white md:grid-cols-auto md:grid-rows-auto md:font-bold md:text-xl">{{ $product->title }}</h2>
            <x-stars :rating="$product->rating" class="col-start-3 row-start-1 md:grid-cols-auto md:grid-rows-auto"></x-stars>
            <div class="flex items-center col-span-2 grid-rows-3 gap-3">
                <p class="p-1 text-sm font-semibold text-black bg-white rounded-md md:text-base w-fit">ELaraverse's <span class="text-orange-800">Choice</span></p>
                <p class="text-sm md:text-base text-zinc-300">Overall Pick</p>
            </div>
        </div>
        <div class="flex flex-col justify-between gap-3 pt-3 mt-3 border-t border-gray-700 md:col-start-2">
            @csrf
            <div data-add-to-cart-in-show class="">
                <input value="1" class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" type="number">
                <button data-id="{{ $product->id }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-img="{{ $product->img_path }}" class="px-3 py-2 font-bold border-0 rounded-md dark:bg-slate-50 dark:text-black">Add to Cart</button>
            </div>
            <div class="flex items-end gap-3">
                <p class="text-2xl text-red-500">-50%</p>
                <p class="text-4xl text-zinc-200">${{ $product->price }}</p>
                <div>
                </div>
            </div>
            <p>
                Previous price:
                <span class="line-through">{{ $product->price * 2 }}</span>
            </p>
            <div class="flex items-end gap-5">
                <p class="text-2xl">Select Color:</p>
                <div class="flex gap-3">
                    <button class="bg-blue-500 rounded-sm size-6"></button>
                    <button class="bg-red-500 rounded-sm size-6"></button>
                    <button class="bg-green-500 rounded-sm size-6"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="mb-5 text-4xl font-bold text-gray-200">Reviews</h2>
        <form class="my-5" action="">
            <label class="block my-3" for="rating">Rating</label>
            <input type="number" name="number" id="rating" class="p-2 rounded-md dark:bg-gray-800 dark:text-gray-300 ring-1 ring-gray-500">
            <label class="block my-3" for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10" class="p-3 dark:text-gray-300 ring-1 ring-gray-500 dark:bg-gray-800"></textarea>
            <input class="block" type="submit" value="Add Comment">
        </form>
        <div class="flex flex-col gap-5">
            @for ($i = 0; $i < 3; $i++)
                <div class="max-w-[60rem]">
                    <div class="flex items-center gap-3">
                        <img class="rounded-full" src="https://placehold.co/50" alt="">
                        <div class="flex flex-col justify-between">
                            <h2 class="pl-1 text-xl font-semibold">John Doe</h2>
                            <x-stars rating="4.8"></x-stars>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold dark:text-gray-300">Pretty much Perfect</h2>
                    <p class="dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam atque itaque nihil! Molestias aspernatur dolore inventore repudiandae ex! Vitae numquam quam quo hic. Quidem non consequatur accusamus voluptatem consequuntur repellat.</p>
                </div>
            @endfor
        </div>
    </div>
    
</x-layout>