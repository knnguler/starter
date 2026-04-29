@props([
    'active' => false,
    'variant' => 'default',
    'size' => 'default',
    'tooltip' => null,
    'href' => null,
    'class' => '',
])

@php
    $base =
        'peer/menu-button flex w-full items-center gap-3 overflow-hidden rounded-xl px-3 py-2 text-left text-sm outline-hidden ring-sidebar-ring transition hover:bg-sidebar-accent hover:text-sidebar-accent-foreground active:bg-sidebar-accent active:text-sidebar-accent-foreground disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-5 [&_svg]:shrink-0';

    $variants = [
        'default' => '',
        'outline' => 'bg-background shadow-[0_0_0_1px_hsl(var(--sidebar-border))]',
    ];

    $sizes = [
        'default' => 'h-9 text-sm',
        'sm' => 'h-7 text-xs',
        'lg' => 'h-12 text-sm',
    ];

    $classes = $base.' '.($variants[$variant] ?? '').' '.($sizes[$size] ?? '').' '.$class;

    $tag = $href ? 'a' : 'button';

    $chevron = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" x-show="\$data.state === 'expanded'"
     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90 !size-3">
    <path d="m9 18 6-6-6-6"></path>
</svg>
SVG;
@endphp
@if($href)
    <div
        x-data="{ tooltipOpen: false }"
        class="relative w-full"
        @mouseenter="if($data.state === 'collapsed') tooltipOpen = true"
        @mouseleave="tooltipOpen = false"
    >
        <a
            href="{{ $href }}"
            data-slot="sidebar-menu-button"
            data-sidebar="menu-button"
            data-active="{{ $active ? 'true' : 'false' }}"
            x-ref="dashBtn"
            x-bind:class="{'justify-center size-10! px-0!': $data.state === 'collapsed'}"
            {{ $attributes->merge([
                'class' => $classes . ' ' . ($active ? 'bg-sidebar-accent text-sidebar-accent-foreground font-medium' : '')
            ]) }}
        >
            {{-- Icon slot - always visible --}}
            @isset($icon)
                <span class="shrink-0">{{ $icon }}</span>
            @endisset

            {{-- Label - hidden when collapsed --}}
            <span
                class="truncate"
                x-show="$data.state === 'expanded'"
                x-transition:enter="transition-opacity duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
            {{ $slot }}
        </span>
        </a>
        @if($tooltip)
        <template x-teleport="body">
            <div x-show="tooltipOpen && $data.state === 'collapsed'"
                 x-anchor.right.offset.10="$refs.dashBtn"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-x-2"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-x-0"
                 x-transition:leave-end="opacity-0 -translate-x-2"
                 class="z-50 overflow-hidden rounded-xl bg-popover px-3 py-2 text-xs text-popover-foreground pointer-events-none">
                {{ $slot }}
            </div>
        </template>
        @endif
    </div>
@else
    <div
        class="relative w-full"
        @if($tooltip)
        x-data="{ tooltipOpen: false }"
        @mouseenter="if($data.state === 'collapsed') tooltipOpen = true"
        @mouseleave="tooltipOpen = false"
        @endif
        >
        <button
            type="button"
            data-slot="sidebar-menu-button"
            data-sidebar="menu-button"
            data-active="{{ $active ? 'true' : 'false' }}"
            x-ref="dashBtn"
            x-bind:class="{'justify-center size-10! px-0!': $data.state === 'collapsed'}"
            {{ $attributes->merge([
                'class' => $classes . ' ' . ($active ? 'bg-sidebar-accent text-sidebar-accent-foreground font-medium' : '')
            ]) }}
        >
            {{-- Icon slot - always visible --}}
            @isset($icon)
                <span class="shrink-0">{{ $icon }}</span>
            @endisset

            {{-- Label - hidden when collapsed --}}
            <span
                class="truncate"
                x-show="$data.state === 'expanded'"
            >
                {{ $slot }}
            </span>
            @if(!$tooltip)
                {!! $chevron !!}
            @endif
        </button>

        @if($tooltip)
            <template x-teleport="body">
                <div x-show="tooltipOpen && $data.state === 'collapsed'"
                     x-anchor.right.offset.10="$refs.dashBtn"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-x-2"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-x-0"
                     x-transition:leave-end="opacity-0 -translate-x-2"
                     class="z-50 overflow-hidden rounded-xl bg-popover px-3 py-2 text-xs text-popover-foreground pointer-events-none">
                    {{ $slot }}
                </div>
            </template>
        @endif
    </div>
@endif
