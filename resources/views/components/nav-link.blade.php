@props(['url'])
<a {{ $attributes }}
    class="{{ (request()->is($url) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white') . ' block px-3 py-2 gap-5 text-sm font-medium rounded-md' }}"
    href="{{ $url }}"
    aria-current="{{ request()->is($url) ? 'page' : 'false' }}">
    {{ $slot }}
</a>
