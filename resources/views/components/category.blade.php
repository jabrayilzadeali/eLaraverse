@props(['category' => "okay"])
<li>
    <a href="#">{{ $category->name }}</a>
    @if ($category->children->isNotEmpty())
        {{-- {{ $category->children }} --}}
        <ul class="pl-5">
            @foreach ($category->children as $child)
                <x-category :category="$child"></x-category>
            @endforeach
        </ul>
    @endif
</li>