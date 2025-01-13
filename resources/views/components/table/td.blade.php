@props([
    'type' => 'text',
    'outer_class' => 'px-4 py-2 align-top',
    'img_path' => '',
    'img_classes' =>
        'mb-4 aspect-square max-w-10 w-full rounded-lg transition-all ease-in-out bg-gray-200 object-cover group-hover:opacity-85 xl:aspect-[7/8]',
    'rating' => 5,
    'rating_classes' => 'block',
    'span_classes' => '',
])
<td class="{{ $outer_class }}">
    @if ($type === 'img')
        <x-img :img_path="$img_path"
            :class="$img_classes"
            {{ $attributes }}></x-img>
    @elseif ($type === 'rating')
        <x-stars :class="$rating_classes" :rating="$rating" {{ $attributes }}></x-stars>
        {{-- <x-stars :class="rating_classes" rating="{{5}}"></x-stars> --}}
    @elseif ($type === 'text')
        <span class="{{ $span_classes }}" {{ $attributes }}>{{ $slot }}</span>
    @endif
</td>
