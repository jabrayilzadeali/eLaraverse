@props(['category' => 'tech', 'parent' => ''])
<li class="relative group">
    <a href="{{ route('category.show', $category->slug) }}" class="block p-2 rounded-md bg-zinc-300/90 dark:bg-zinc-600">{{ $category->name }}</a>
    @if ($category->children->isNotEmpty())
        <div class="absolute z-50 hidden pl-5 min-w-[30rem] bg-transparent group-hover:block -top-3 left-full">
            <div class="grid grid-cols-3 grid-rows-3 gap-5 px-5 py-4 rounded-md bg-zinc-200 dark:bg-zinc-600">
                @foreach ($category->children as $child)
                    <div>
                        <h2 class="text-xl font-bold min-w-28"><a href="{{ route('category.show', $child->slug) }}">{{ $child->name }}</a></h2>
                        @if ($category->children->isNotEmpty())
                            <ul>
                                @foreach ($child->children as $c)
                                    <li><a href="{{ route('category.show', $c->slug) }}" class="flex transition-all hover:text-white hover:translate-x-1">
                                        <x-icons.dot></x-icons.dot>
                                        <span>{{ $c->name }}</span>
                                    </a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</li>
