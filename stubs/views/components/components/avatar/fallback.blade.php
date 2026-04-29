<span
    x-cloak
    x-show="__showFallback"
    {{ $attributes->twMerge('flex h-full w-full items-center justify-center text-xs font-semibold rounded-full bg-accent') }}
>
    {{ $slot }}
</span>

