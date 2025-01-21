{{-- @props(['category' => 'tech', 'parent' => '']) --}}
{{-- <li class="relative block w-56 pl-2 group bg-zinc-200 dark:bg-zinc-600">
    <a href="{{ route('category.show', $category->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">{{ $category->name }}</a>
    @if ($category->children->isNotEmpty())
        <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover:block left-full">
            @foreach ($category->children as $child)
                <x-ct :category="$child" z="wow"></x-ct>
            @endforeach
        </div>
    @endif
</li> --}}


@props(['category' => 'tech', 'parent' => ''])
<li class="relative block w-56 pl-2 group bg-zinc-200 dark:bg-zinc-600">
    <a href="{{ route('category.show', $category->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
        {{ $category->name }}
    </a>
    @if ($category->children->isNotEmpty())
        <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover:block left-full">
            @foreach ($category->children as $child)
                <x-ct :category="$child" z="wow"></x-ct>
                {{-- 
                <div class="relative block w-56 pl-2 group-okay bg-zinc-200 dark:bg-zinc-600">
                    <a href="{{ route('category.show', $child->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
                        {{ $child->name }}
                    </a>
                    <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover-okay:block left-full">
                        @foreach ($child->children as $c)
                            <div class="relative block w-56 pl-2 group-okay bg-zinc-200 dark:bg-zinc-600">
                                <a href="{{ route('category.show', $c->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
                                    {{ $c->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                --}}
            @endforeach
        </div>
    @endif
</li>
