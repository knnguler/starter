{{-- resources/views/components/layout/input/viewable.blade.php --}}
@props([
    'for' => null,
    'labelShow' => __('Show password'),
    'labelHide' => __('Hide password'),
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
    x-data="{ shown: false }"
    x-on:click.prevent.stop="
        (() => {
            const root = $el.closest('[data-flux-input]') ?? $el.parentElement;
            const input =
                ({{ $for ? 'root?.querySelector(' . json_encode($for) . ')' : 'root?.querySelector("input")' }}) ||
                root?.querySelector('input');

            if (! input || input.disabled) return;

            shown = !shown;
            input.type = shown ? 'text' : 'password';
            input.focus();
        })()
    "
    x-bind:aria-label="shown ? '{{ $labelHide }}' : '{{ $labelShow }}'"
    x-bind:title="shown ? '{{ $labelHide }}' : '{{ $labelShow }}'"
>
    <span class="sr-only" x-text="shown ? '{{ $labelHide }}' : '{{ $labelShow }}'"></span>

    {{-- ikonlar --}}
    <template x-if="!shown">
        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
    </template>
    <template x-if="shown">
        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M3 3l18 18"/>
            <path d="M10.6 10.6A3 3 0 0 0 12 15a3 3 0 0 0 2.4-4.4"/>
            <path d="M9.9 5.1A10.9 10.9 0 0 1 12 5c6.5 0 10 7 10 7a19.6 19.6 0 0 1-4.2 5.1"/>
            <path d="M6.2 6.2A19.6 19.6 0 0 0 2 12s3.5 7 10 7c1 0 2-.2 2.9-.5"/>
        </svg>
    </template>
</button>
