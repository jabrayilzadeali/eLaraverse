{{-- @props(['category', 'z'])
<div class="relative block w-56 pl-2 group/wow {{ /* 'group/' . $z */ }} bg-zinc-200 dark:bg-zinc-600">
    <a href="{{ route('category.show', $category->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">{{ $category->name . $z }}</a>
    @if ($category->children->isNotEmpty())
        <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent group-hover/wow:block {{/*  'group-hover/' . $z . ':block'  */}} left-full">
        </div>
    @endif
</div> --}}
            {{-- @foreach ($category->children as $child)
                <x-ct :category="$child" z="okay"></x-ct>
            @endforeach --}}

{{-- @props(['category', 'z'])
<div class="relative block w-56 pl-2 {{ 'group-' . $z }} bg-zinc-200 dark:bg-zinc-600">
    <a href="{{ route('category.show', $category->slug) }}" class="block p-2 bg-zinc-300/90 dark:bg-zinc-600">
        {{ $category->name }}
    </a>
    @if ($category->children->isNotEmpty())
        <div class="absolute top-0 z-50 hidden p-2 -translate-y-2 bg-transparent {{ 'group-hover-' . $z . ':block' }} left-full">
            @foreach ($category->children as $child)
                {{ $child->name }}
            @endforeach
        </div>
    @endif
</div> --}}