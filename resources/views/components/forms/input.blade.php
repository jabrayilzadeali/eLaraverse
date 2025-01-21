@props(['name', 'label', 'item' => '', 'class' => 'col-span-2', 'type' => 'text'])
<div class="{{ $class }}">
    <label for="{{ $name }}" class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $item) }}"
        class="block min-w-0 grow py-1.5 rounded-md pl-2 pr-3 text-base text-gray-900 placeholder:text-gray-400 dark:bg-neutral-800 dark:text-neutral-200 focus:outline focus:outline-0 sm:text-sm/6"
        placeholder="{{ $label }}">
    @error($name)
        <div class="text-sm text-red-500">{{ $message }}</div>
    @enderror
</div>
