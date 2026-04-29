{{-- resources/views/components/layout/input/file.blade.php --}}
@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'multiple' => null,
    'size' => null,
])

@php
    // wrapper
    $wrap = 'w-full flex items-center gap-4 relative';

    // shadcn-ish button
    $btn = implode(' ', [
        'inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all',
        'h-9 px-4 rounded-md',
        'bg-primary text-primary-foreground shadow-xs hover:bg-primary/90',
        'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring/50 focus-visible:ring-[3px]',
    ]);

    $label = 'text-sm text-muted-foreground truncate';
@endphp

<div
    {{ $attributes->except('class')->class($wrap) }}
    data-flux-input-file
    wire:ignore
    tabindex="0"
    x-data
    x-on:click.prevent.stop="$refs.input.click()"
    x-on:keydown.enter.prevent.stop="$refs.input.click()"
    x-on:keydown.space.prevent.stop
    x-on:keyup.space.prevent.stop="$refs.input.click()"
    x-on:change="
        const f = $event.target.files;
        $refs.name.textContent = f?.[1] ? (f.length + ' {{ __('files') }}') : (f?.[0]?.name || '{{ __('No file chosen') }}');
    "
>
    <input
        x-ref="input"
        type="file"
        class="sr-only"
        @isset($name) name="{{ $name }}" @endisset
        @if ($multiple) multiple @endif
        @if (is_numeric($size)) size="{{ $size }}" @endif
        {{ $attributes->only(['accept', 'capture'])->merge() }}
    />

    <span class="{{ $btn }}">
        {{ __('Choose file') }}
    </span>

    <span x-ref="name" class="{{ $label }}">
        {{ __('No file chosen') }}
    </span>
</div>
