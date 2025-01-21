@props(['currentCategory' => 0, 'category' => 0, 'parent' => ''])
<li class="">
    {{-- <a href="{{ route('category.show', $category->slug) }}" class="block px-2 py-1 rounded-lg {{ $currentCategory === $category->id ? ' bg-green-500' : ' bg-neutral-500 dark:bg-red-500' }}">{{ $category->name }} {{ gettype($currentCategory),  }} {{ $currentCategory }} {{ gettype($category->id) }} {{ $category->id }} {{ $currentCategory === $category->id ? 'okay' : 'false' }}</a> --}}
    <a href="{{ $category->children->isEmpty() ? route('category.show', $category->slug) : '#' }}" 
        @class([
            'block px-2 py-1 rounded-lg',
            'bg-neutral-500' => $currentCategory === $category->id,
            'bg-neutral-500 dark:bg-neutral-800' => $currentCategory !== $category->id
        ])>
        {{ $category->name }}
     </a>
    @if ($category->children->isNotEmpty())
        <ul class="flex flex-col gap-4 mt-4 ml-5">
            @foreach ($category->children as $child)
                <x-category :currentCategory="$currentCategory ?? 0" :category="$child"></x-category>
            @endforeach
        </ul>
    @endif
</li>