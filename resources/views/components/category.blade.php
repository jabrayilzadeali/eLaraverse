@props(['category' => "okay"])
<li class="">
    <a href="#" class="block px-2 py-1 rounded-lg bg-neutral-200 dark:bg-neutral-800/90">{{ $category->name }}</a>
    @if ($category->children->isNotEmpty())
        <ul class="flex flex-col gap-4 mt-4 ml-5">
            @foreach ($category->children as $child)
                <x-category :category="$child"></x-category>
            @endforeach
        </ul>
    @endif
</li>