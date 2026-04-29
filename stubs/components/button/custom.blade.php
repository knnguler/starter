@props([
    'variant' => 'ghost',
    'size' => 'icon-sm',
    'as' => 'a',
    'href' => null,
])
<x-button :variant="$variant" :size="$size" :as="$as" :href="$href" {{ $attributes }}>
    {{$slot}}
</x-button>
