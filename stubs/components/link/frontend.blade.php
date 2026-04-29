@props(['active', 'href' => null])

@php
    $classes = ($active ?? false)
                ? ''
                : 'flex items-center justify-start w-full font-medium dark:font-normal text-left px-2.5 h-9 gap-x-3 rounded-full text-sm text-sidebar-foreground transition hover:bg-white/10 hover:text-sidebar-accent-foreground active:bg-sidebar-accent active:text-sidebar-accent-foregroundrounded-full cursor-pointer group-data-[collapse]:size-11 group-data-[collapse]:px-0 group-data-[collapse]:justify-center group/item';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
