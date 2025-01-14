@props(['url'])
@php
    $active = request()->is($url.'*');
@endphp
<a {{ $attributes }}
    class="{{ ($active ? 'bg-gray-900 text-white' : 'dark:text-gray-300 hover:bg-gray-700 hover:text-white') . ' block px-3 py-2 gap-5 text-sm font-medium rounded-md' }}"
    href="{{ $url !== '/' ? '/' . $url : $url }}"
    aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
