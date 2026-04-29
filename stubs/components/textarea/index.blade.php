@props([
    'name' => null,
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'autoresize' => false,
])

@php
    $baseClasses = 'placeholder:text-muted-foreground/50 selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input text-accent-foreground w-full min-w-0 rounded-xl border bg-transparent px-4 py-2 text-base shadow-xs transition-[color,box-shadow] outline-none disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus:placeholder:text-muted-foreground/80 focus-visible:outline-none focus-visible:ring-1 focus:border-ring dark:focus:border-ring focus-visible:ring-ring aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive';
    $sizeClasses = [
        'sm' => 'py-1.5 px-2 text-sm',
        'md' => 'py-3 px-3 text-sm',
        'lg' => 'py-3 px-4 text-base',
    ][$size];

    $autoresizeClass = $autoresize ? 'field-sizing-content resize-none' : '';

    $iconClasses = ($icon && $iconPosition === 'left') ? 'pl-11' : '';
    $iconClasses .= ($icon && $iconPosition === 'right') ? 'pr-11' : '';
@endphp

<div class="relative">
    @if($icon && $iconPosition === 'left')
        <span class="absolute top-3 left-0 flex items-center pl-4">
            <x-icon :name="$icon" class="size-4 text-muted-foreground"/>
        </span>
    @endif
    <textarea {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $iconClasses $autoresizeClass"]) }}>{{ $slot }}</textarea>
    @if($icon && $iconPosition === 'right')
        <span class="absolute top-3 right-0 flex items-center pr-4">
            <x-icon :name="$icon" class="size-4 text-muted-foreground"/>
        </span>
    @endif
</div>
