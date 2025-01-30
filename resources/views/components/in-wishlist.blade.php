@props(['inWishlist'])
@if ($inWishlist)
    <x-icons.heart-full></x-icons.heart-full>
@else
    <x-icons.heart></x-icons.heart>
@endif
