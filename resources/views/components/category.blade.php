@props(['currentCategory' => '', 'category' => 'tech', 'parent' => ''])
<li class="">
    <a href="{{ route('category.show', $category->slug) }}" class="block px-2 py-1 rounded-lg {{ $currentCategory === $category->id ? 'bg-red-500' : 'bg-neutral-200 dark:bg-neutral-800/90' }}">{{ $category->name }}</a>
    @if ($category->children->isNotEmpty())
        <ul class="flex flex-col gap-4 mt-4 ml-5">
            @foreach ($category->children as $child)
                <x-category :currentCategory="$currentCategory ?? ''" :category="$child"></x-category>
            @endforeach
        </ul>
    @endif
</li>