{{-- resources/views/components/layout/input/index.blade.php --}}
@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),

    'variant' => 'outline',   // outline | filled
    'invalid' => null,
    'loading' => null,

    'type' => 'text',
    'mask' => null,
    'size' => null,           // xs | sm | (null=md)
    'icon' => null,           // leading icon (component name) (optional)
    'iconLeading' => null,
    'iconTrailing' => null,   // trailing icon (component name) (optional)
    'kbd' => null,            // string like "⌘K"

    'clearable' => null,
    'copyable' => null,
    'viewable' => null,
    'expandable' => null,
])

@php
    $invalid ??= ($name && $errors->has($name));

    $iconLeading ??= $icon;
    $hasLeadingIcon = (bool) $iconLeading;

    $trailingCount = collect([
        (bool) $iconTrailing,
        (bool) $kbd,
        (bool) $clearable,
        (bool) $copyable,
        (bool) $viewable,
        (bool) $expandable,
        (bool) $loading,
    ])->filter()->count();

    $padRight = match (true) {
        $trailingCount <= 0 => 'pe-3',
        $trailingCount === 1 => 'pe-10',
        $trailingCount === 2 => 'pe-16',
        $trailingCount === 3 => 'pe-24',
        $trailingCount === 4 => 'pe-32',
        $trailingCount === 5 => 'pe-40',
        default => 'pe-48',
    };

    $sz = match ($size) {
        'xs' => 'h-8 text-xs',
        'sm' => 'h-9 text-sm',
        default => 'h-10 text-sm',
        'lg' => 'h-12 text-sm',
    };

    $baseInput = implode(' ', [
        'appearance-none file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex w-full min-w-0 rounded-xl border bg-transparent shadow-xs transition-[color,box-shadow] outline-none text-foreground',
        'px-4', $padRight,
        $hasLeadingIcon ? 'ps-10' : 'ps-4',
        $sz,
        'placeholder:text-muted-foreground/60',
        'focus-visible:border-ring focus-visible:ring-ring focus-visible:ring-1',
        'disabled:cursor-not-allowed disabled:opacity-50',
        $invalid ? 'border-destructive' : 'border-input',
        $variant === 'filled' ? 'bg-muted/40' : '',
    ]);

    $wrap = 'w-full relative block group/input';
    $leadingWrap = 'pointer-events-none absolute inset-y-0 start-3.5 flex items-center text-muted-foreground';
    $trailingWrap = 'absolute inset-y-0 end-2 flex items-center gap-1';

    $iconClass = 'size-4';
@endphp

<div {{ $attributes->class($wrap) }}>
    @if ($hasLeadingIcon)
        <div class="{{ $leadingWrap }}" aria-hidden="true">
            <x-dynamic-component component="icon" :name="$iconLeading" class="{{ $iconClass }}" />
        </div>
    @endif

    <input
        {{ $attributes->twMerge($baseInput) }}
        @isset($name) name="{{ $name }}" @endisset
        type="{{ $type }}"
        @if ($mask) x-mask="{{ $mask }}" @endif
        @if ($invalid) aria-invalid="true" data-invalid @endif
        data-ui-control
        data-ui-group-target
    />

    @if ($trailingCount > 0)
        <div class="{{ $trailingWrap }}" data-ui-input>
            @if ($kbd)
                <kbd class="hidden sm:inline-flex items-center font-sans tracking-tight px-3 py-0.5 text-xs text-muted-foreground/70">
                    {{ $kbd }}
                </kbd>
            @endif

            @if ($iconTrailing)
                <span class="inline-flex h-8 w-8 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <x-dynamic-component component="icon" :name="$iconTrailing" class="{{ $iconClass }}" />
                </span>
            @endif

            @if ($clearable)
                <x-input.clearable />
            @endif

            @if ($copyable)
                <x-input.copyable />
            @endif

            @if ($viewable)
                <x-input.viewable />
            @endif

            @if ($expandable)
                <x-input.expandable />
            @endif

            @if ($loading)
                <span class="inline-flex h-8 w-8 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <svg class="size-4 animate-spin" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v2a6 6 0 0 0-6 6H4z"></path>
                    </svg>
                </span>
            @endif
        </div>
    @endif
</div>
