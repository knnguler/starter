@props([
    'variant' => 'default', // default, destructive, outline, secondary, ghost, link
    'size' => 'default',    // xs, sm, default, lg, icon
    'type' => 'button',
    'icon' => null,
    'iconLeading' => null,
    'iconTrailing' => null,
    'loading' => null,
    'disabled' => false,
    'asChild' => false,
])

@php
    // Icon Logic
    $iconLeading ??= $icon;

    $slotHtml = trim($slot->toHtml());
    $hasLeadingIcon = preg_match('/^(<x-icon|<svg)/i', $slotHtml) || isset($iconLeading);
    $hasTrailingIcon = preg_match('/(<\/x-icon>|<\/svg>)$/i', $slotHtml) || isset($iconTrailing);

    // Eğer içerik (slot) boşsa, butonu kare (square) yap
    $square = $slot->isEmpty();

    $isLivewire = $attributes->whereStartsWith('wire:click')->isNotEmpty();
    $loading ??= $isLivewire;

    $baseClasses = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-xl text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 cursor-pointer relative';

    // Variants
    $variantClasses = match ($variant) {
        'default' => 'bg-primary text-primary-foreground border-primary hover:bg-primary/90',
        'destructive' => 'bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90',
        'outline' => 'border border-input bg-background dark:bg-input/50 shadow-xs hover:bg-popover dark:hover:bg-input hover:text-accent-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-xs hover:bg-secondary/80',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
        'link' => 'text-secondary-foreground underline-offset-4 hover:underline',
        default => 'bg-primary text-primary-foreground shadow-xs hover:bg-primary/90',
    };

    // Sizes
    // Input componentindeki h-değerleri ile eşleştirildi.
    $sizeClasses = match ($size) {
        'xs' => $square ? 'h-8 w-8' : 'h-8 px-2 text-xs',
        'sm' => $square ? 'h-9 w-9' : 'h-9 px-3 text-sm',
        'default' => $square ? 'size-9.5' : 'h-9.5 px-4 py-2',
        'lg' => $square ? 'h-11 w-11' : 'h-11 px-8',
        'icon-xs' => 'p-0 size-8',
        'icon-sm' => 'p-0 size-9',
        'icon' => 'p-0 size-9.5',
        'icon-lg' => 'p-0 size-11',
        default => $square ? 'h-10 w-10' : 'h-10 px-4 py-2',
    };

    // Icon Sizes
    $iconSize = match ($size) {
        'xs' => 'size-3.5',
        'sm' => 'size-4',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $paddingClasses = '';
    if (!$square && !str_starts_with($size, 'icon')) {
        if ($hasLeadingIcon) {
            $paddingClasses = match ($size) {
                'xs' => 'pr-5',
                'sm' => 'pr-7',
                'lg' => 'pr-12',
                default => 'pr-12',
            };
        } elseif ($hasTrailingIcon) {
            $paddingClasses = match ($size) {
                'xs' => 'pl-5',
                'sm' => 'pl-7',
                'lg' => 'pl-12',
                default => 'pl-12',
            };
        }
    }

    // Final Component Classes
    $classes = \Illuminate\Support\Arr::toCssClasses([
        $baseClasses,
        $variantClasses,
        $sizeClasses,
        $paddingClasses,
    ]);
@endphp



@if ($asChild)
    <{{ $asChild }} {{ $attributes->merge(['type' => $type])->twMerge($classes) }}>
    {{ $slot }}
    </{{ $asChild }}>
@elseif ($attributes->has('href'))
    <a {{ $attributes->merge(['type' => $type])->twMerge($classes) }}>
        {{ $slot }}
    </a>
@else

    <button
        {{ $attributes->merge(['type' => $type])->twMerge($classes) }}
        @if($loading && $type !== 'submit') wire:loading.attr="disabled" @endif
    >
        {{ $slot }}
    </button>
@endif
