@props(['name', 'checked' => false])

<div @click="open = false" {{ $attributes->merge(['class' => 'relative flex items-center px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100']) }}>
    <input type="radio" name="{{ $name }}" {{ $checked ? 'checked' : '' }} class="mr-2 rounded-full text-blue-600 border-gray-300 focus:ring-blue-500" />
    {{ $slot }}
</div>
