@props([
    'variant' => 'ghost',
    'size' => 'icon-xs',
    'as' => 'button',
    'id' => null,
])
<x-button variant="ghost" :size="$size" {{ $attributes }}  wire:click="destroy({{$id}})" wire:confirm="{{__('Are you sure you want to delete ?')}}" x-tooltip.raw="{{ __('Delete') }}">
    <x-icon name="delete" class="size-4"/>
</x-button>
