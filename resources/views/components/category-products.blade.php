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


{{-- <li class="relative block w-56 pl-2 group bg-zinc-200 dark:bg-zinc-600">
    <a href="{{ route('category.show', $category->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
        {{ $category->name }}
    </a>
    @if ($category->children->isNotEmpty())
        <div class="absolute top-0 z-50 hidden -translate-y-2 bg-transparent group-hover:block left-full">
            @foreach ($category->children as $child)
                <div class="relative block w-56 pl-2 group/okay bg-zinc-200 dark:bg-zinc-600">
                    <a href="{{ route('category.show', $child->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
                        {{ $child->name }}
                    </a>
                    <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover/okay:block left-full">
                        okay wow
                        @foreach ($child->children as $c)
                            <div class="relative block w-56 pl-2 group-okay bg-zinc-200 dark:bg-zinc-600">
                                <a href="{{ route('category.show', $c->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
                                    {{ $c->name }}
\V<li class="relative block w-56 pl-2 group bg-zinc-200 dark:bg-zinc-600">    <a href="wow" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">        bir    </a>    <div class="absolute top-0 z-50 hidden -translate-y-2 bg-transparent group-hover:block left-full">        <div class="relative block w-56 pl-2 group/yaxsi bg-zinc-200 dark:bg-zinc-600">            <a href="zor" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">                iki            </a>            <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover/yaxsi:block left-full">                okay            </div>        </div>    </div></li>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</li> --}}



{{-- <li class="relative block w-56 pl-2 group bg-zinc-200 dark:bg-zinc-600">
    <a href="wow" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
        bir
    </a>
    <div class="absolute top-0 z-50 hidden -translate-y-2 bg-transparent group-hover:block left-full">
        <div class="relative block w-56 pl-2 group/okay bg-zinc-200 dark:bg-zinc-600">
            <a href="zor" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
                iki
            </a>
            <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover/okay:block left-full">
                <div class="bg-red-500">uc</div>
            </div>
        </div>
    </div>
</li> --}}

@props(['category' => 'tech', 'parent' => ''])
<li class="relative block w-56 pl-2 group bg-zinc-200 dark:bg-zinc-600">
    <a href="{{ route('category.show', $category->slug) }}"
        class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">{{ $category->name }}</a>
    <!-- First dropdown (appears when hovering 'bir') -->
    @if ($category->children->isNotEmpty())
        <div class="absolute top-0 z-50 hidden bg-transparent group-hover:block left-full">
            @foreach ($category->children as $c)
                <div class="relative block w-56 pl-2 group/item bg-zinc-200 dark:bg-zinc-600">
                    <a href="{{ route('category.show', $c->slug) }}"
                        class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">{{ $c->name }}</a>
                    <!-- Second dropdown (appears when hovering 'iki') -->
                    @if ($c->children->isNotEmpty())
                        <div
                            class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover/item:block left-full">
                            @foreach ($c->children as $c2)
                                <div class="relative block w-56 pl-2 group/item bg-zinc-200 dark:bg-zinc-600">
                                    <a href="{{ route('category.show', $c2->slug) }}"
                                        class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">{{ $c2->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</li>
