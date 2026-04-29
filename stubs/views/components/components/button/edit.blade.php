@props([
    'variant' => 'ghost',
    'size' => 'icon-xs',
    'as' => 'a',
    'href' => null,
    'modal' => null,
    'id' => null,
])
@if(!empty($modal))
    <x-button :variant="$variant" :size="$size" type="button" wire:click="edit({{$id}})" {{ $attributes }} x-tooltip.raw="{{ __('Edit') }}">
        <x-icon name="pen" class="size-4"/>
    </x-button>
@else
    <x-button :variant="$variant" :size="$size" :as="$as" :href="$href" {{ $attributes }} x-tooltip.raw="{{ __('Edit') }}">
        <x-icon name="pen" class="size-4"/>
    </x-button>
@endif
