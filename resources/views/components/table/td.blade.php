@props([
    'type' => 'text',
    'outer_class' => 'px-4 py-2 align-top',
    'span_classes' => '',
])
<td class="{{ $outer_class }}">
    <span class="{{ $span_classes }}" {{ $attributes }}>{{ $slot }}</span>
</td>
