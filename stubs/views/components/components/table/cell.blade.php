@props([
    'align' => null,
    'variant' => null,
])

@php
    $baseClasses = '';

    $alignClasses = match ($align) {
        'center' => 'text-center',
        'end' => 'text-end',
        default => '',
    };

    $variantClasses = match ($variant) {
        'strong' => 'font-medium text-accent-foreground',
        default => 'text-accent-foreground',
    };

    $classes = trim(
        $baseClasses . ' ' .
        $alignClasses . ' ' .
        $variantClasses
    );
@endphp

<td {{ $attributes->twMerge($classes) }} data-flux-cell>
    {{ $slot }}
</td>
