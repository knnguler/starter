@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'variant' => 'outline',
    'invalid' => null,
    'size' => null,
])

@php
    $invalid ??= ($name && $errors->has($name));

    $szClass = match ($size) {
        'xs' => 'size-3.5',
        'sm' => 'size-4',
        'lg' => 'size-6',
        default => 'size-5',
    };

    $baseClass = implode(' ', [
        'peer shrink-0 appearance-none rounded-[0.25rem] border shadow-xs transition-all outline-none bg-transparent',
        'focus-visible:ring-1 focus-visible:ring-ring focus-visible:outline-none focus:outline-none focus:ring-0',
        'checked:bg-primary checked:border-primary',
        'disabled:cursor-not-allowed disabled:opacity-50',
        $invalid ? 'border-destructive' : 'border-input',
        $szClass,
    ]);
@endphp

<div class="relative inline-flex items-center justify-center align-middle">
    <input
        type="checkbox"
        {{ $attributes->twMerge($baseClass) }}
        @isset($name) name="{{ $name }}" @endisset
        @if ($invalid) aria-invalid="true" data-invalid @endif
    />
    <svg class="pointer-events-none absolute text-primary-foreground opacity-0 peer-checked:opacity-100 transition-opacity w-[70%] h-[70%]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="20 6 9 17 4 12"></polyline>
    </svg>
</div>
