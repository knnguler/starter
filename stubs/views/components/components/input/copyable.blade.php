{{-- resources/views/components/layout/input/copyable.blade.php --}}
@props([
    'for' => null,
    'label' => __('Copy'),
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
    x-data="{ copied: false, t: null }"
    x-on:click.prevent.stop="
        (() => {
            const root = $el.closest('[data-flux-input]') ?? $el.parentElement;
            const input =
                ({{ $for ? 'root?.querySelector(' . json_encode($for) . ')' : 'root?.querySelector("input,textarea")' }}) ||
                root?.querySelector('input,textarea');

            if (! input) return;

            const value = input.value ?? '';
            if (navigator?.clipboard?.writeText) {
                navigator.clipboard.writeText(value);
            } else {
                input.select();
                document.execCommand('copy');
                input.setSelectionRange(input.value.length, input.value.length);
            }

            copied = true;
            clearTimeout(t);
            t = setTimeout(() => copied = false, 1200);
        })()
    "
    x-bind:aria-label="copied ? '{{ __('Copied') }}' : '{{ $label }}'"
    x-bind:title="copied ? '{{ __('Copied') }}' : '{{ $label }}'"
>
    <span class="sr-only" x-text="copied ? '{{ __('Copied') }}' : '{{ $label }}'"></span>

    @if (trim($slot) !== '')
        {{ $slot }}
    @else
        {{-- copy icon --}}
        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M9 9h10v10H9z"/>
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
        </svg>
    @endif
</button>
