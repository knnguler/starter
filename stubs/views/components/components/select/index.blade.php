@props([
    'name' => null,
    'size' => 'md',
])

@php
    $baseClasses = 'placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input text-accent-foreground w-full min-w-0 rounded-xl border bg-transparent shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus:placeholder:text-muted-foreground/80 focus-visible:outline-none focus-visible:ring-1 focus:border-ring dark:focus:border-ring focus-visible:ring-ring aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive appearance-none [&_option]:bg-popover w-full
    [&_option]:text-popover-foreground
    [&_optgroup]:bg-popover
    [&_optgroup]:text-popover-foreground';
    $sizeClasses = [
        'sm' => 'py-1 h-9 px-3 text-sm',
        'md' => 'py-1.5 h-10 px-4 text-sm',
        'lg' => 'py-3 h-11 px-4 text-base',
    ][$size];

@endphp

<select {{ $attributes->twMerge(['class' => "$baseClasses $sizeClasses"]) }}>
    {{ $slot }}
    {{ $append ?? '' }}
</select>
