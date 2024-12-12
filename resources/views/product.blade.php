<x-layout>
    <div class="grid gap-3 md:grid-cols-2 md:grid-rows-[repeat(3, auto)]">
        <div class="row-start-2 md:row-span-2 md:row-start-auto">
            <img src="https://picsum.photos/seed/picsum/500/300" alt="">
        </div>
        <div class="grid flex-col grid-cols-3 grid-rows-[repeat(3, auto)] gap-2 md:flex md:grid-cols-1 md:grid-rows-auto grid-rows-auto">
            <p class="text-zinc-200 auto-cols-min">Brand Name</p>
            <h2 class="col-span-3 row-start-2 font-semibold text-white md:grid-cols-auto md:grid-rows-auto md:font-bold md:text-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo atque debitis, dolore molestias saepe eius unde eaque quas illum tempora obcaecati nostrum placeat facilis iste culpa laudantium corporis delectus libero.</h2>
            <x-stars class="col-start-2 row-start-1 md:grid-cols-auto md:grid-rows-auto"></x-stars>
            <div class="flex items-center col-span-2 grid-rows-3 gap-3">
                <p class="p-1 text-base font-semibold text-black bg-white rounded-md w-fit">ELaraverse's <span class="text-orange-800">Choice</span></p>
                <p class="text-zinc-300">Overall Pick</p>
            </div>
        </div>
        <div class="pt-3 mt-3 border-t border-gray-700 md:col-start-2">
            <div class="flex items-end gap-3">
                <p class="text-2xl text-red-500">-50%</p>
                <p class="text-4xl text-zinc-200">$50</p>
                <div>
                </div>
            </div>
            <p>
                Previous price:
                <span class="line-through">$100</span>
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