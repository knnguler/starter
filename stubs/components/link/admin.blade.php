@props(['active', 'href' => null])

@php
    $classes = ($active ?? false)
                ? ''
                : 'flex items-center justify-start w-full text-left px-2.5 h-8 shrink-0 gap-x-3 text-sm text-accent-foreground dark:text-accent-foreground/80 hover:bg-secondary hover:text-foreground  dark:hover:text-accent-foreground rounded-2xl transition duration-300 cursor-pointer group-data-[collapse]:size-10 group-data-[collapse]:px-0 group-data-[collapse]:justify-center group/item';
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
