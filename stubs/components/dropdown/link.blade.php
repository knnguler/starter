<a {{ $attributes->twMerge('w-full flex items-center gap-2 px-3 py-1.5 text-sm text-secondary-foreground/80 cursor-pointer hover:bg-secondary rounded-xl hover:text-accent-foreground outline-none disabled:pointer-events-none disabled:opacity-50') }}
    @click="open = false"
    x-on:mouseover="$el.focus()"
    x-on:mouseleave="$el.blur()">
    {{ $slot }}
</a>
