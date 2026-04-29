{{-- resources/views/components/layout/input/expandable.blade.php --}}
@props([
    'label' => __('Expand'),
    // expand davranışı senin UI’ına göre değişebilir; default: input focus + custom event
    'event' => 'input:expand',
])

<button
    type="button"
    {{ $attributes->class([
        'inline-flex items-center justify-center rounded-md',
        'h-8 w-8',
        'text-muted-foreground hover:text-foreground',
        'hover:bg-accent',
        'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring/50 focus-visible:ring-[3px]',
        'disabled:pointer-events-none disabled:opacity-50',
        '-me-1',
    ]) }}
    x-data
    x-on:click.prevent.stop="
        $dispatch('{{ $event }}', { el: $el.closest('[data-flux-input]') });
    "
    aria-label="{{ $label }}"
    title="{{ $label }}"
>
    <span class="sr-only">{{ $label }}</span>

    @if (trim($slot) !== '')
        {{ $slot }}
    @else
        {{-- expand icon --}}
        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M15 3h6v6"/>
            <path d="M21 3l-7 7"/>
            <path d="M9 21H3v-6"/>
            <path d="M3 21l7-7"/>
        </svg>
    @endif
</button>
