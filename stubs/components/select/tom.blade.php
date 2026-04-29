@props([
    'options' => [],
    'selects' => null,
    'placeholder' => '',
    'model' => null,
    'route' => null,
    'name' => '',
    'multiple' => null,
    'create' => null
])

@php
    $uniqId = 'select' . uniqid();
@endphp
<div wire:ignore>
<div
    wire:key="tom-{{ $uniqId }}"
    x-data="tomSelectComponent({
        uniqId: @js($uniqId),
        model: @js($model),
        placeholderValue: @js($placeholder),
        multiple: @js((bool) $multiple),
        create: @js((bool) $create),
        route: @js($route),
        name: @js($name),
    })"
    x-init="init()"
>
    <select
        x-ref="{{ $uniqId }}"
        wire:model="{{ $model }}"
        {{ $attributes }}
        {{ $multiple ? 'multiple' : '' }}
    >
        <option value="">Seçiniz</option>
        @foreach($options as $option => $label)
            <option value="{{ $option }}">{{ $label }}</option>
        @endforeach
    </select>
</div>
</div>
