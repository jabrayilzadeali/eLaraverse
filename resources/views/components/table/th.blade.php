@props(['hasSorting' => false, 'sorts' => [], 'sortQuery' => 'query'])
<th class="{{ $hasSorting ? 'flex' : '' }} px-4 py-2 text-left">
    <span>{{ $slot }}</span>
    @if ($hasSorting)
        <div data-icons="{{ $sortQuery }}">
            <x-icons.up-arrow data-icon-up-arrow :class="(isset($sorts[$sortQuery]) && $sorts[$sortQuery] === 'asc') ? '' : 'hidden'"></x-icons.up-arrow>
            <x-icons.down-arrow data-icon-down-arrow :class="(isset($sorts[$sortQuery]) && ($sorts[$sortQuery] === 'desc')) ? '' : 'hidden'"></x-icons.down-arrow>
            <x-icons.up-down-arrow data-icon-up-down-arrow :class="(isset($sorts[$sortQuery]) && ($sorts[$sortQuery] === 'asc' || $sorts[$sortQuery] === 'desc')) ? 'hidden' : ''"></x-icons.up-down-arrow>
        </div>
    @endif
</th>
