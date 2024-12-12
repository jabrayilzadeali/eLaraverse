@props(['slug', 'img' => 'https://picsum.photos/seed/picsum/200/300', 'title', 'rating', 'price', 'previousPrice'])
<div class="transition-all duration-300 ease-in-out group hover:-translate-y-5">
    <a href="{{ $slug }}">
        <img src="{{ $img }}"
            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
            class="aspect-square w-full rounded-lg transition-all ease-in-out bg-gray-200 object-cover group-hover:opacity-85 xl:aspect-[7/8]">
        <h3 class="mt-4 text-sm text-gray-700 transition-all ease-in-out dark:text-gray-100 hover:text-gray-300 line-clamp-2">{{ $title }}</h3>
    </a>
    <x-stars :rating="$rating"></x-stars>
    <p class="flex items-end gap-5 mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">
        <span class="text-xl">${{ $price }}</span>
        <span class="text-base line-through">${{ $previousPrice }}</span>
    </p>
</div>
