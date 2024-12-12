@props(['title'])
<x-layout>
    <div class="grid gap-3 md:grid-cols-2 md:grid-rows-[repeat(3, auto)]">
        <div class="row-start-2 md:row-span-2 md:row-start-auto">
            <img src="{{ $product->img_path }}" alt="">
        </div>
        <div class="grid md:flex-col justify-between grid-cols-3 grid-rows-[repeat(3, auto)] gap-2 md:flex md:grid-cols-1">
            <p class="text-zinc-200 auto-cols-min">Brand Name</p>
            <h2 class="col-span-3 row-start-2 font-semibold text-white md:grid-cols-auto md:grid-rows-auto md:font-bold md:text-xl">{{ $product->title }}</h2>
            <x-stars :rating="$product->rating" class="col-start-2 row-start-1 md:grid-cols-auto md:grid-rows-auto"></x-stars>
            <div class="flex items-center col-span-2 grid-rows-3 gap-3">
                <p class="p-1 text-base font-semibold text-black bg-white rounded-md w-fit">ELaraverse's <span class="text-orange-800">Choice</span></p>
                <p class="text-zinc-300">Overall Pick</p>
            </div>
        </div>
        <div class="pt-3 mt-3 border-t border-gray-700 md:col-start-2">
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
</x-layout>