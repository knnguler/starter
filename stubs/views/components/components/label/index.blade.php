@aware(['required' => false])

@props([
    'value' => null
])

@php
    $classes = [
        'text-sm [:where(&)]:text-start select-none inline-flex cursor-pointer',
        '[:where(&)]:text-neutral-800 [:where(&)]:dark:text-secondary-foreground',
    ];
@endphp

<label {{ $attributes->class($classes) }} data-slot="label">
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{ $value }}
    @endif

    {{-- The weirdest thing about @aware is when using the component without a parent, the vars aren't known so we check if it's set using isset() --}}
    @if(isset($required) && $required)
        <span class="text-red-500 text-xs px-1 py-1" aria-hidden="true">
            *
        </span>
    @endif
</label>
