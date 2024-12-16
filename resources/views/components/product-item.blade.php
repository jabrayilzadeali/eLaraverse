@props(['id', 'slug', 'img' => 'https://picsum.photos/seed/picsum/200/300', 'title', 'rating', 'price', 'previousPrice'])
<div class="transition-all duration-300 ease-in-out group hover:-translate-y-5">
    <a href="{{ $slug }}">
        <img src="{{ $img }}"
            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
            class="mb-4 aspect-square w-full rounded-lg transition-all ease-in-out bg-gray-200 object-cover group-hover:opacity-85 xl:aspect-[7/8]">
        <x-stars :rating="$rating"></x-stars>
        <h3 class="my-2 text-sm text-gray-700 transition-all ease-in-out dark:text-gray-100 hover:text-gray-300 line-clamp-2">{{ $title }}</h3>
    </a>
    <div class="flex items-center justify-between">
        <div>
            <p class="text-xl">${{ $price }}</p>
            <p class="text-base line-through">${{ $previousPrice }}</p>
        </div>
        <div >
            <button data-add-to-cart data-id="{{ $id }}" data-img="{{ $img }}" data-title="{{ $title }}" data-price="{{ $price }}" class="px-3 py-2 text-black bg-white rounded-md disabled:bg-slate-300">Add To Cart</button>
            <button data-remove-from-cart data-id="{{ $id }}" data-img="{{ $img }}" data-title="{{ $title }}" data-price="{{ $price }}" class="hidden px-3 py-2 text-black bg-white rounded-md disabled:bg-slate-300">Remove From Cart</button>
        </div>
    </div>
</div>
