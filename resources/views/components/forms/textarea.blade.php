@props(['name', 'label', 'item' => '', 'class' => 'col-span-full'])
<div class="{{ $class }}">
    <label for="{{ $name }}" class="block font-medium text-gray-900 dark:text-gray-300 text-sm/6">{{ $label }}</label>
    <textarea class="h-40 p-3 text-sm text-black rounded-md dark:bg-neutral-800 dark:text-neutral-200 w-96" name="{{ $name }}" id="">{{ old($name, $item) }}</textarea>
    @error($name)
        <div class="text-sm text-red-500">{{ $message }}</div>
    @enderror
</div>
