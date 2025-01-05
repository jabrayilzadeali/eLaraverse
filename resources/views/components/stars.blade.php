{{-- * * _ * * --}}
@props(['rating' => 2.8])
@php
    $rating = (float)$rating
@endphp
<div {{ $attributes->merge(['class' => 'flex items-end text-orange-500']) }}>
    @for ($i = 0; $i < intval($rating); $i++)
        <x-icons.full-star></x-icons.full-star>
    @endfor
    @if ($rating !== floor($rating))
        <x-icons.half-star></x-icons.half-star>
    @endif
    @if (5 - round($rating) > 0)
        @for ($i = 0; $i < (5 - ceil($rating)); $i++)
            <x-icons.empty-star></x-icons.empty-star>
        @endfor
    @endif
    <span class="ml-2 text-black dark:text-white">{{ $rating }}</span>
</div>
