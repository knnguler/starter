{{-- resources/views/components/layout/input/group/index.blade.php --}}
@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
])

@php
    $classes = implode(' ', [
        'w-full flex',
        '*:data-flux-input:grow',

        // Inputs borders...
        '[&>[data-flux-input]:last-child:not(:first-child)>[data-flux-group-target]:not([data-invalid])]:border-s-0',
        '[&>[data-flux-input]:not(:first-child):not(:last-child)>[data-flux-group-target]:not([data-invalid])]:border-s-0',
        '[&>[data-flux-input]:has(+[data-flux-input-group-suffix])>[data-flux-group-target]:not([data-invalid])]:border-e-0',

        // Selects and date pickers borders...
        '[&>*:last-child:not(:first-child)>[data-flux-group-target]:not([data-invalid])]:border-s-0',
        '[&>*:not(:first-child):not(:last-child)>[data-flux-group-target]:not([data-invalid])]:border-s-0',
        '[&>*:has(+[data-flux-input-group-suffix])>[data-flux-group-target]:not([data-invalid])]:border-e-0',

        // Buttons borders...
        '[&>[data-flux-group-target]:last-child:not(:first-child)]:border-s-0',
        '[&>[data-flux-group-target]:not(:first-child):not(:last-child)]:border-s-0',
        '[&>[data-flux-group-target]:has(+[data-flux-input-group-suffix])]:border-e-0',

        // Weld group target radiuses...
        '[&>[data-flux-group-target]:not(:first-child):not(:last-child)]:rounded-none',
        '[&>[data-flux-group-target]:first-child:not(:last-child)]:rounded-e-none',
        '[&>[data-flux-group-target]:last-child:not(:first-child)]:rounded-s-none',

        // Weld radiuses for sub-children (button inside select, etc.)
        '[&>*:not(:first-child):not(:last-child):not(:only-child)>[data-flux-group-target]]:rounded-none',
        '[&>*:first-child:not(:last-child)>[data-flux-group-target]]:rounded-e-none',
        '[&>*:last-child:not(:first-child)>[data-flux-group-target]]:rounded-s-none',

        // Weld radiuses for sub-sub-children (input inside select wrapper)
        '[&>*:not(:first-child):not(:last-child):not(:only-child)>[data-flux-input]>[data-flux-group-target]]:rounded-none',
        '[&>*:first-child:not(:last-child)>[data-flux-input]>[data-flux-group-target]]:rounded-e-none',
        '[&>*:last-child:not(:first-child)>[data-flux-input]>[data-flux-group-target]]:rounded-s-none',
    ]);
@endphp

<div {{ $attributes->class($classes) }} data-flux-input-group>
    {{ $slot }}
</div>
