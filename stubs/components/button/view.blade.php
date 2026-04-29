@props([
    'variant' => 'ghost',
    'size' => 'icon-xs',
    'as' => 'a',
    'href' => null,
])
<x-button :variant="$variant" :size="$size" :as="$as" :href="$href" {{ $attributes }} x-tooltip.raw="{{ __('View') }}">
    <x-icon name="eye" class="size-4"/>
</x-button>
