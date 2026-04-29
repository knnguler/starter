{{-- resources/views/components/layout/input/clearable.blade.php --}}
@props([
    'for' => null,      // x-ref veya query selector: ör. 'input'
    'label' => __('Clear'),
])

<button
    type="button"
    {{ $attributes->class([
        'inline-flex items-center justify-center rounded-md cursor-pointer',
        'h-8 w-8',
        'text-muted-foreground hover:text-foreground',
        'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring/50 focus-visible:ring-[3px]',
        'disabled:pointer-events-none disabled:opacity-50',

        '[[data-ui-input]:has(input:placeholder-shown)_&]:hidden',
        '[[data-ui-input]:has(input[disabled])_&]:hidden',
    ]) }}
    x-data
    x-on:click.prevent.stop="
        (() => {
            const root = $el.closest('[data-ui-input]') ?? $el.parentElement;
            const input =
                ({{ $for ? 'root?.querySelector(' . json_encode($for) . ')' : 'root?.querySelector("input,textarea")' }}) ||
                root?.querySelector('input,textarea');

            if (! input || input.disabled) return;

            input.value = '';
            input.dispatchEvent(new Event('input', { bubbles: true }));
            input.dispatchEvent(new Event('change', { bubbles: true }));
            input.focus();
        })()
    "
>
    <span class="sr-only">{{ $label }}</span>

    {{-- ikon: varsa slot, yoksa basit X --}}
    @if (trim($slot) !== '')
        {{ $slot }}
    @else
        <svg viewBox="0 0 24 24" class="size-4" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M18 6 6 18M6 6l12 12"/>
        </svg>
    @endif
</button>
