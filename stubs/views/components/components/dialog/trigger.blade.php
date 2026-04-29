@props([
    'variant' => 'outline',
])

<x-button
    :$variant
    wire:click="$dispatch('open-modal', { modal: 'form'})"
>
    {{ $slot }}
</x-button>
